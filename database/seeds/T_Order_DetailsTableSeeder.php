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
                'order_quantity' => 1,
                'shipment_date' => date('2020-10-23 20:55:19'),
            ],
            [
                'products_id' => 2,
                'order_id' => 1,
                'shipment_status_id' => 1,
                'order_quantity' => 2,
                'shipment_date' => date('2020-10-23 20:55:19'),
            ],
            [
                'products_id' => 3,
                'order_id' => 1,
                'shipment_status_id' => 2,
                'order_quantity' => 3,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 4,
                'order_id' => 4,
                'shipment_status_id' => 3,
                'order_quantity' => 4,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 5,
                'shipment_status_id' => 3,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
