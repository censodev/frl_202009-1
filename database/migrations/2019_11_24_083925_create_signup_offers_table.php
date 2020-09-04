<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignupOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->string('alias_contact')->nullable();
            $table->text('register_contact')->nullable();
            $table->timestamps();
            $table->smallInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signup_offers');
    }
}
