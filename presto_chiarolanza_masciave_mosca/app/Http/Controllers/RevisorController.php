<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        $articles_pending = Article::where('is_accepted', null)->orderBy('created_at', 'asc')->paginate(6);
        return view('revisor.index', compact('articles_pending'));
    }

    public function show(Article $article){
        /* dd($article); */
        return view('revisor.show', compact('article'));
    
    }

    public function accept(Article $article){
        $article->setAccepted(true);
        $last_article_pending = Article::where('is_accepted', null)->orderBy('created_at', 'asc')->take(1)->get();
        /* dd($last_article_pending); */
        /* return redirect()->route('revisor.show' , ['article' => $last_article_pending]); */
        return redirect()->route('revisor.index');
    }

    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect()->route('revisor.index');
    }   
}
