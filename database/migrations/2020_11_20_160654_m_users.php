<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('password', 64);
            $table->string('last_name', 16);
            $table->string('first_name', 16);
            $table->integer('zipcode')->nullable();
            $table->string('prefecture', 16)->nullable();
            $table->string('municipality', 16)->nullable();
            $table->string('address', 32)->nullable();
            $table->string('apartments', 32)->nullable();
            $table->string('email', 128);
            $table->string('phone_number', 16)->nullable();
            $table->bigInteger('user_classification_id')->unsigned()->nullable();
            $table->foreign('user_classification_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name', 128)->nullable();
            $table->char('delete_flag', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('users');
    }
}
