<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        $articles_pending = Article::where('is_accepted', null)->orderBy('created_at', 'asc')->paginate(6);
        // Ottieni l'ora corrente
        $interval = Carbon::now()->subMinutes(5);  
        // Esegui la query per ottenere l'ultimo elemento aggiornato nell'intervallo di 5 minuti
        $lastModified = Article::where('updated_at', '>=', $interval)->orderBy('updated_at', 'desc')
        ->first();
        
        return view('revisor.index', compact('articles_pending','lastModified'));
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
        return redirect()->route('revisor.index')->with('cancel', 'Annulla l\'ultima azione');
    }
    
    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect()->route('revisor.index')->with('cancel', 'Annulla l\'ultima azione');
    }   

    public function cancel(){
        $interval = Carbon::now()->subMinutes(1);  
        // Esegui la query per ottenere l'ultimo elemento aggiornato nell'intervallo di 1 minuto
        $lastModified = Article::where('updated_at', '>=', $interval)->orderBy('updated_at', 'desc')
        ->first();
        $lastModified->setAccepted(null);
        return redirect()->route('revisor.index')->with('success', 'Hai annullato l\'ultima azione');
    } 
}
