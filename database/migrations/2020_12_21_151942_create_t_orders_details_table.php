<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTOrdersDetailsTable extends Migration
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
            $table->unsignedInteger('products_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('shipment_status_id');
            $table->string('order_detail_number', 64);
            $table->Integer('order_quantity');
            $table->timestamp('shipment_date');
            $table->foreign('order_id')
            ->references('id')->on('t_orders')
            ->onDelete('cascade');
            $table->foreign('shipment_status_id')
            ->references('id')->on('m_shipments_statuses');
            $table->foreign('products_id')
            ->references('id')->on('m_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('t_orders_details');
    }
}
