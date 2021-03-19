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
        Schema::create('t_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_price');
            $table->integer('purchase_quantity');
            $table->string('purchase_company', 128);
            $table->timestamp('order_date')->useCurrent();
            $table->timestamp('purchase_date')->useCurrent();
            $table->integer('products_id')->unsigned();

            //$table->foreign('products_id')->references('id')->on(m_products)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_purchases');
    }
}
