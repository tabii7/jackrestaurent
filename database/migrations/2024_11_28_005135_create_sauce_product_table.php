<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
   

    Schema::create('sauce_product', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('product_id');
        $table->unsignedBigInteger('sauce_id');
        $table->timestamps();
    
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('sauce_id')->references('id')->on('sauces')->onDelete('cascade');
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauce_product');
    }
};
