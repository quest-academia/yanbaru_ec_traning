<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',64);
            $table->integer('category_id')->unsigned();
            $table->integer('price')->unsigned();
            $table->string('description',256);
            $table->integer('sale_status_id')->unsigned();
            $table->integer('product_status_id')->unsigned(); 
            $table->timestamp('resist_date');
            $table->integer('user_id')->unsigned();
            $table->char('delete_flag',1);

            $table->foreign('sale_status_id')->references('id')->on('m_sales_statuses')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('m_products_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_products');
    }
}
