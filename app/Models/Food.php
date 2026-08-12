<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // ডেটাবেসে ডেটা সেভ করার পারমিশন
    protected $guarded = [];

    // ক্যাটাগরির সাথে সম্পর্ক (Relation) তৈরি করা
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}