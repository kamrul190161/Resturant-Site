<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    // কাস্টমারদের কন্টাক্ট পেজ (ফ্রন্টএন্ড) দেখানোর ফাংশন
    public function showContactPage()
    {
        return view('contact.contact');
    }

    // কাস্টমার কন্টাক্ট পেজ থেকে মেসেজ পাঠালে সেটা সেভ করার ফাংশন
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string'
        ]);

        ContactMessage::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully. We will contact you soon!');
    }

    // অ্যাডমিন প্যানেলে মেসেজ দেখানোর ফাংশন
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    // মেসেজ পড়া হয়ে গেলে সেটার স্ট্যাটাস পরিবর্তন করার ফাংশন
    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->is_read = 1;
        $message->save();

        return redirect()->back()->with('success', 'Message marked as read!');
    }
}