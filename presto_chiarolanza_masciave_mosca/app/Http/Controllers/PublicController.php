<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {

        $articles = Article::orderBy('created_at', 'desc')->where('is_accepted', true)->take(6)->get();
        return view('welcome', compact('articles'));
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(12);
        return view('articles.searched', ['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function team()
    {
        return view('team');
    }

    public function instagram()
    {
        return view('instagram');
    }

    public function showUser($user)
    {
        $user_id = $user;
        $userRecord = User::where('id', $user_id)->first();
        $userName = $userRecord->name;
        $ArticleByUser =  Article::where('user_id', $user_id)->where('is_accepted', true)->paginate(6);
        return view('articles.byUser', ['articles' => $ArticleByUser, 'userName' => $userName]);
    }
}
