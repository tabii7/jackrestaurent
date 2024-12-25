<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');

            $table->text('description');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->json('allergen_info')->nullable();
            $table->json('sauces')->nullable();
            $table->json('extras')->nullable();
            $table->json('drinks')->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('discount')->default(false);
            $table->boolean('salad')->default(false);

            $table->decimal('discounted_price', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
