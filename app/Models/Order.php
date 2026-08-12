<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    // রিলেশনশিপ: একটি অর্ডারের ভেতরে অনেকগুলো আইটেম (খাবার) থাকতে পারে
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}