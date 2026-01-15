<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:leads,email',
        ]);

        Lead::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'You are in. The guide is on its way.',
        ]);
    }
}