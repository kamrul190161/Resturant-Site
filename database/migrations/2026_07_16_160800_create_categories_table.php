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
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // ক্যাটাগরির নাম (যেমন: Pizza, Burger)
        $table->string('slug')->unique(); // ইউআরএল এর জন্য 
        $table->string('image')->nullable(); // ক্যাটাগরির ছবি 
        $table->boolean('status')->default(1); // 1 = Active, 0 = Inactive
        $table->timestamps();
    });
}
};
