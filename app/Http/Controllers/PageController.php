<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ]);

        try {
            Mail::send([], [], function ($message) use ($validated) {
                $message->to(env('MAIL_FROM_ADDRESS'))
                    ->replyTo($validated['email'], $validated['name'])
                    ->subject('Contact Form: ' . $validated['subject'])
                    ->text($validated['message']);
            });

            return back()->with('success', 'Thank you! Your message has been sent successfully.');
        } catch (\Exception $e) {
            Log::error('Contact form email error: ' . $e->getMessage());
            return back()->with('error', 'Failed to send message. Error: ' . $e->getMessage());
        }
    }
}
        


