<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_price')->unsigned();
            $table->integer('purchase_quantity');
            $table->string('purchase_company', 128);
            $table->timestamp('order_date')->useCurrent();
            $table->timestamp('purchase_date')->useCurrent();
            $table->integer('product_id')->unsigned();

            // $table->foreign('product_id')->references('product_id')->on('m_products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
