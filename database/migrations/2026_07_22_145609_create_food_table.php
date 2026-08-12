<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('food', function (Blueprint $table) {
        $table->id();
        
        // ক্যাটাগরির সাথে সম্পর্ক (Relation) তৈরি করার জন্য
        $table->foreignId('category_id')->constrained()->cascadeOnDelete();
        
        // ফুড আইটেমের অন্যান্য তথ্য
        $table->string('name');
        $table->string('slug');
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2); // দাম রাখার জন্য
        $table->string('image')->nullable(); // ছবির নাম রাখার জন্য
        $table->boolean('status')->default(1);
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
