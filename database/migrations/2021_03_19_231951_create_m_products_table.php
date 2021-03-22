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
            $table->increments('id');
            $table->string('product_name', 64);
            $table->unsignedInteger('category_id');
            $table->integer('price');
            $table->string('description', 256);
            $table->unsignedInteger('sale_status_id');
            $table->unsignedInteger('product_status_id');
            $table->timestamp('regist_date');
            $table->unsignedInteger('user_id');
            $table->char('delete_flag', 1)->default(0);

            // $table->foreign('id')->references('products_id')->on('t_order_detalls')->onDelete('cascade');
            // $table->foreign('id')->references('product_id')->on('t_purchases')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('m_users')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('m_categorles')->onDelete('cascade');
            // $table->foreign('sale_status_id')->references('id')->on('m_sale_statuses')->onDelete('cascade');
            // $table->foreign('product_status_id')->references('id')->on('m_product_statuses')->onDelete('cascade');
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
