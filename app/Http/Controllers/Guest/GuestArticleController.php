<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class GuestArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('articleCategory')->get();
        return view('guest.hirek', compact('articles'));
    }

    public function singleArticle($id)
    {
        $article = Article::find($id);

        if ($article) 
        {
            return view('guest.hir', compact('article'));
        } 
        else 
        {
            abort(404);
    }
    }
}