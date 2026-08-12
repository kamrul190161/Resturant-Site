<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // about ফোল্ডারের ভেতরের about.blade.php ফাইলটিকে কল করা হয়েছে
        return view('about.about'); 
    }
}