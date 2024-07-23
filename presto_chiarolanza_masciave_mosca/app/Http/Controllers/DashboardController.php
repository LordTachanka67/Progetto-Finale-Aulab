<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /* ARITICOLI ACCETTATI */
        $acceptedArticles = Article::where('is_accepted', true)->where('user_id', Auth::id())->get();
        /* dd($acceptedArticles); */
        /* ARITICOLI RIFIUTATI */
        $rejectedArticles = Article::where('is_accepted', false)->where('user_id', Auth::id())->get();

        /* ARITICOLI IN ATTESA DI ACCETTAZIONE */
        $pendingArticles = Article::where('is_accepted', null)->where('user_id', Auth::id())->get();

        return view('dashboard.index', compact('acceptedArticles', 'rejectedArticles', 'pendingArticles'));
    }

    function show(Article $article)
    {
        return view('dashboard.show', compact('article'));
    }

    function edit(Article $article)
    {
        /* VERIFICA SE L'UTENTE E' AUTORIZZATO A MODIFICARE L'ARTICOLO */
        if (Auth::id() != $article->user_id) {
            return redirect()->route('dashboard.index')->with('danger', __('ui.autorizzatoModifica'));
        }
        $oldImages = $article->images();

        return view('dashboard.edit', compact('article', 'oldImages'));
    }

    function update(Request $request, Article $article)
    {
        /* VERIFICA SE L'UTENTE E' AUTORIZZATO A MODIFICARE L'ARTICOLO */
        if (Auth::id() != $article->user_id) {
            return redirect()->route('dashboard.index')->with('danger', __('ui.autorizzatoModifica'));
        }
        /* dd($request->all()); */
        $data = $request->all();
        $article->update(['title' => $data['title'], 'description' => $data['description'], 'price' => $data['price'], 'category_id' => $data['category'], 'user_id' => Auth::id(), 'is_accepted' => null]);
        return redirect()->route('dashboard.index')->with('success', __('ui.articoloAggiornato'));
    }

    function destroy(Article $article)
    {
        /* VERIFICA SE L'UTENTE E' AUTORIZZATO A MODIFICARE L'ARTICOLO */
        if (Auth::id() != $article->user_id) {
            return redirect()->route('dashboard.index')->with('danger', __('ui.autorizzatoModifica'));
        }
        $article->delete();
        return redirect()->route('dashboard.index')->with('success', __('ui.articoloEliminato'));
    }

    public function preferiti()
    {
        $pivotRecords = DB::table('article_user')
            ->where('user_id', Auth::id())
            ->get();

        $favoritesArticles = Article::whereIn('id', $pivotRecords->pluck('article_id'))->paginate(6);
        /* dd($favoritesArticles); */
        return view('dashboard.preferiti', compact('favoritesArticles'));
    }

    function cart()
    {
        return view('dashboard.carrello');
    }

    function feedbacks()
    {
        return view('dashboard.feedbacks');
    }
}
