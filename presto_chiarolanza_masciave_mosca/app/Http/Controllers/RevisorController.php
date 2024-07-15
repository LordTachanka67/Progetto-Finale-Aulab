<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        $articles_pending = Article::where('is_accepted', null)->get();
        return view('revisor.index', compact('articles_pending'));
    }
}
