<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    // রিলেশনশিপ: একটি আইটেম একটি নির্দিষ্ট অর্ডারের আন্ডারে থাকে
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}