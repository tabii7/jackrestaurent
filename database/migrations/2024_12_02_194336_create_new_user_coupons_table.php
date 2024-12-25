<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewUserCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('new_user_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', 10, 2);
            $table->integer('expiry'); // Expiry in days
            $table->string('image'); // Path to the image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('new_user_coupons');
    }
}
