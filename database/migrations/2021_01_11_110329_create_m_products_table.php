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
            $table->integer('price');
            $table->string('description', '256');
            $table->bigInteger('sale_status_id')->unsigned();
            $table->bigInteger('product_status_id')->unsigned();
            $table->timestamp('regist_date');
            // m_usersテーブル完成し次第変更予定
            // $table->integer('user_id')->unsigned();
            $table->integer('user_id');
            $table->char('delete_flag', '1');
            $table->foreign('category_id')->references('id')->on('m_categories')->onDelete('cascade');
            $table->foreign('sale_status_id')->references('id')->on('m_sale_statuses')->onDelete('cascade');
            $table->foreign('product_status_id')->references('id')->on('m_product_statuses')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('m_users')->onDelete('cascade');
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
