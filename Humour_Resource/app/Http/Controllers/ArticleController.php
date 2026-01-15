<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        
        $recommendations = Article::where('id', '!=', $article->id)
                                ->inRandomOrder()
                                ->take(2)
                                ->get();

        return view('articles.show', compact('article', 'recommendations'));
    }
}