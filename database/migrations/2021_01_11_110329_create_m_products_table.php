<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name', '64');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('m_categories');
            $table->string('description', '256');
            $table->bigInteger('sale_status_id')->unsigned();
            $table->foreign('sale_status_id')->references('id')->on('m_sales_statuses');
            $table->bigInteger('product_status_id')->unsigned();
            $table->foreign('product_status_id')->references('id')->on('m_products_statuses');
            $table->timestamp('regist_date');
            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('m_users');
            $table->integer('user_id');
            $table->char('delete_flag', '1');
            $table->timestamps('');
        
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
