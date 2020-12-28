<?php

use Illuminate\Database\Seeder;

class T_OrdersDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = new DateTime();
        DB::table('t_orders_details')->insert([
            'products_id' => 1,
            'order_id' => 1,
            'shipment_status_id' => 1,
            'order_detail_number' => '12345678',
            'order_quantity' => 2,
            'shipment_date' => $dt->modify('+2 day')->format('Y-m-d H:i:s')
        ]);
        DB::table('t_orders_details')->insert([
            'products_id' => 2,
            'order_id' => 1,
            'shipment_status_id' => 1,
            'order_detail_number' => '12345678',
            'order_quantity' => 3,
            'shipment_date' => $dt->format('Y-m-d H:i:s')
        ]);
        DB::table('t_orders_details')->insert([
            'products_id' => 2,
            'order_id' => 2,
            'shipment_status_id' => 1,
            'order_detail_number' => '12345678910',
            'order_quantity' => 3,
            'shipment_date' => $dt->modify('+2 day')->format('Y-m-d H:i:s')
        ]);
        DB::table('t_orders_details')->insert([
            'products_id' => 2,
            'order_id' => 4,
            'shipment_status_id' => 1,
            'order_detail_number' => '23456',
            'order_quantity' => 3,
            'shipment_date' => $dt->format('Y-m-d H:i:s')
        ]);
        DB::table('t_orders_details')->insert([
            'products_id' => 3,
            'order_id' => 4,
            'shipment_status_id' => 1,
            'order_detail_number' => '23456',
            'order_quantity' => 1,
            'shipment_date' => $dt->format('Y-m-d H:i:s')
        ]);
    }
}
