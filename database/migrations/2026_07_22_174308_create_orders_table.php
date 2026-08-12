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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        
        // কাস্টমারের তথ্য
        $table->string('customer_name');
        $table->string('customer_phone');
        $table->text('delivery_address');
        
        // অর্ডারের তথ্য
        $table->decimal('total_amount', 10, 2)->default(0);
        
        // অর্ডারের অবস্থা (pending, processing, delivered, cancelled)
        $table->string('status')->default('pending');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
