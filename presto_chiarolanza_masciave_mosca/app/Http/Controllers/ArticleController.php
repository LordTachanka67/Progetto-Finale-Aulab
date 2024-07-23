<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleCreateRequest;

use function Laravel\Prompts\alert;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->where('is_accepted', true)->paginate(9);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /*   public function store(ArticleCreateRequest $request)
    {
        dd($request->all());

        Auth::user()->articles()->create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id  
        ]);

        return redirect()->back()->with('success', 'Articolo creato con successo!');
    } */

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article_id = $article->id;
        $user_id = Auth::id();
        $exist = DB::table('article_user')->where('article_id', $article_id)->where('user_id', $user_id)->exists();
        if ($exist) {
            /* dd("esiste"); */
        } else {
            /* dd("non esiste"); */
        }

        $correlated = Article::where('category_id', $article->category_id)->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(4);
        // dd($correlated);
        return view('articles.show', compact('article', 'correlated', 'exist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function favourites(Request $request, Article $article)
    {

        $user = Auth::user();
        $article_id = $request->article_id;
        Auth::user()->favourites()->attach($request->favourites);
        return redirect()->back();
        // CREARE LA COLONNA IS FAVOURITE BOOLEANA DEFAULT FALSE
        // CREARE UN METODO PER AGGIUNGERE E RIMUOVERE IL FAVOURITE DALLA COLONNA
        // INSERIRE LA ACTION NEL FORM
    }

    public function unfavourites(Request $request, Article $article)
    {
        $user = Auth::user();
        $article_id = $request->article_id;
        Auth::user()->favourites()->detach($request->favourites);
        return redirect()->back();
    }
}
