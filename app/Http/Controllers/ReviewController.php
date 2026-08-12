<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        // reviews ফোল্ডারের ভেতরের reviews.blade.php ফাইলটিকে কল করা হয়েছে
        return view('reviews.reviews'); 
    }
}