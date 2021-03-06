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
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'products_id' => 2,
                'order_id' => 2,
                'shipment_status_id' => 1,
                'order_quantity' => 2,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'products_id' => 3,
                'order_id' => 2,
                'shipment_status_id' => 1,
                'order_quantity' => 3,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 4,
                'order_id' => 4,
                'shipment_status_id' => 2,
                'order_quantity' => 4,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 5,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 6,
                'shipment_status_id' => 2,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 7,
                'shipment_status_id' => 2,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 8,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 9,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 10,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 11,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 12,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 13,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 14,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 15,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 16,
                'shipment_status_id' => 2,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 17,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 18,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 19,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 20,
                'shipment_status_id' => 1,
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'order_id' => 1,
                'shipment_status_id' => 1,
                'order_quantity' => 7,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 4,
                'order_id' => 1,
                'shipment_status_id' => 1,
                'order_quantity' => 15,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 5,
                'order_id' => 1,
                'shipment_status_id' => 1,
                'order_quantity' => 5,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 1,
                'order_id' => 4,
                'shipment_status_id' => 2,
                'order_quantity' => 3,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 2,
                'order_id' => 4,
                'shipment_status_id' => 2,
                'order_quantity' => 8,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
