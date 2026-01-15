<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CoachingService;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with dynamic content.
     */
    public function index()
    {
        // 1. Fetch 3 most recent articles
        $latestArticles = Article::latest()->take(3)->get();

        // 2. Fetch all coaching services sorted by order_weight
        $services = CoachingService::orderBy('order_weight', 'asc')->get();

        // 3. Fetch all testimonials
        $testimonials = Testimonial::all();

        // 4. Return the view with data
        return view('welcome', compact('latestArticles', 'services', 'testimonials'));
    }
}
