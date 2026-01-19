<?php

namespace App\Http\Controllers;

use App\Mail\AdminContactNotification;
use App\Mail\UserContactConfirmation;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        $message = ContactMessage::create($validated);

        // Send Email to Admin (Queue)
        Mail::to(config('mail.from.address', 'admin@humourresource.com'))
            ->send(new AdminContactNotification($message));

        // Send Auto-Reply to User (Queue)
        Mail::to($message->email)
            ->send(new UserContactConfirmation($message));

        return back()->with('success', 'Thank you! Your message has been received. We will be in touch shortly.');
    }
}