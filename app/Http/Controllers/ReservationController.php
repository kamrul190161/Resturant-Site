<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    // ১. কাস্টমারদের ফ্রন্টএন্ডে রিজার্ভেশন পেজ দেখানোর ফাংশন (আপনার আগের কোড)
    public function index()
    {
        return view('reservation.reservation'); 
    }

    // ২. কাস্টমার ফর্ম সাবমিট করলে ডেটাবেসে সেভ করার ফাংশন
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'guests' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|string',
            'special_requests' => 'nullable|string'
        ]);

        Reservation::create($request->all());

        return redirect()->back()->with('success', 'Your table reservation request has been sent successfully. We will confirm it shortly!');
    }

    // ৩. অ্যাডমিন প্যানেলে রিজার্ভেশন লিস্ট দেখানোর ফাংশন (নাম পরিবর্তন করে adminIndex রাখা হলো)
    public function adminIndex()
    {
        $reservations = Reservation::latest()->get();
        return view('admin.reservations', compact('reservations'));
    }

    // ৪. অ্যাডমিন প্যানেল থেকে স্ট্যাটাস আপডেট করার ফাংশন (Pending -> Confirmed)
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully!');
    }
}
