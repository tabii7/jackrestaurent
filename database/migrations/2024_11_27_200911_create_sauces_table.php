<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaucesTable extends Migration
{
    public function up()
    {
        Schema::create('sauces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2); // For storing prices
            $table->string('image'); // For storing image paths
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sauces');
    }
}
