<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = []; // এই লাইনটি দিলে আর কোনো ফিল্ড ব্লকের এরর আসবে না
}