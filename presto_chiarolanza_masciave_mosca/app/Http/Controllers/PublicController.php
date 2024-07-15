<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){

        $articles = Article::orderBy('created_at', 'desc')->where('is_accepted', true)->take(6)->get();
        return view('welcome',compact('articles'));
    }
}
