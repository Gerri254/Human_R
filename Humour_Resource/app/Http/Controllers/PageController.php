<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CoachingService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $services = CoachingService::all();
        return view('pages.services', compact('services'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function blog()
    {
        $articles = Article::latest()->paginate(9);
        return view('pages.blog', compact('articles'));
    }
}