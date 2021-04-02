<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTOrdersDetallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_orders_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');//products_id　から修正
            $table->foreign('product_id')->references('id')->on('m_products')->onDelete('cascade');//products_id　から修正
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('t_orders')->onDelete('cascade');
            $table->unsignedInteger('shipment_status_id');
            $table->foreign('shipment_status_id')->references('id')->on('m_shipment_statuses')->onDelete('cascade');
            $table->string('order_detail_number', 64);
            $table->integer('order_quantity');
            $table->timestamp('shipment_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_orders_details');
    }
}
