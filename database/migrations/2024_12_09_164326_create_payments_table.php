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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id'); // Guest user's name
            $table->string('name')->nullable(); // Guest user's name
            $table->string('phone')->nullable(); // Guest user's phone number
            $table->text('address')->nullable(); // Delivery or billing address
            $table->text('items_purchased')->nullable(); // Details of purchased items (JSON format recommended)
            $table->text('amount')->nullable(); // Total payment amount
            $table->string('payment_method')->nullable(); // Payment method (e.g., Credit Card, PayPal)
            $table->string('status')->default('pending'); // Payment status (e.g., pending, completed, failed)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
