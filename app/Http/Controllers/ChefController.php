<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChefController extends Controller
{
     public function index()
    {
    
        return view('chefs.chefs'); 
    }
}
