<?php

use Illuminate\Database\Seeder;

class T_Orders_DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_orders_details')->insert([
            'product_id' => 1,//products_idから修正
            'order_id' => 1,
            'shipment_status_id' => 1,
            'order_detail_number' => '1',
            'order_quantity' => 1,
            'shipment_date' => new DateTime()
        ]);
    }
}
