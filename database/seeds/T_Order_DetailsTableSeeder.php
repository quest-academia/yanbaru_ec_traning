<?php

use Illuminate\Database\Seeder;

class T_Order_DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_order_details')->insert([
            [
            'products_id' => 1,
            'order_id' => 1,
            'shipment_status_id' => 1,
            'order_detail_number' => 1,
            'order_quantity' => 1,
            'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
            'products_id' => 2,
            'order_id' => 2,
            'shipment_status_id' => 1,
            'order_detail_number' => 2,
            'order_quantity' => 2,
            'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
            'products_id' => 3,
            'order_id' => 2,
            'shipment_status_id' => 1,
            'order_detail_number' => 3,
            'order_quantity' => 3,
            'shipment_date' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
