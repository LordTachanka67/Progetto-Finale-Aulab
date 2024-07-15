<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
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
        return view('dashboard.edit', compact('article'));
    }

    function update(Request $request, Article $article)
    {
        dd($request->all());
        $data = $request->all();
        $article->update($data);
        return redirect()->route('dashboard.index');
    }
}
