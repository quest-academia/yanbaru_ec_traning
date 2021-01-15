<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('products_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('shipment_status_id');
            $table->string('order_detail_number', 64);
            $table->integer('order_quantity');
            $table->timestamp('shipment_date');

            //$table->foreign('products_id')->references('id')->on('m_products')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('t_orders')->onDelete('cascade');
            $table->foreign('shipment_status_id')->references('id')->on('m_shipment_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_order_details');
    }
}
