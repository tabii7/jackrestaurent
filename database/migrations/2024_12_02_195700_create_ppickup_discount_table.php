<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpickupDiscountTable extends Migration
{
    public function up()
    {
        Schema::create('ppickup_discount', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppickup_discount');
    }
}
