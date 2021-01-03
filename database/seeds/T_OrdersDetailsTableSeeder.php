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
        for ($i = 1; $i <= 30; $i++) {
            DB::table('t_orders_details')->insert([
                'products_id' => 1,
                'order_id' => $i,
                'shipment_status_id' => 1,
                'order_detail_number' => $i,
                'order_quantity' => 2,
                'shipment_date' => $dt->modify('+1 day')->format('Y-m-d H:i:s')
            ]);
            DB::table('t_orders_details')->insert([
                'products_id' => 2,
                'order_id' => $i,
                'shipment_status_id' => 1,
                'order_detail_number' => $i,
                'order_quantity' => 2,
                'shipment_date' => $dt->modify('+1 day')->format('Y-m-d H:i:s')
            ]);
            DB::table('t_orders_details')->insert([
                'products_id' => 3,
                'order_id' => $i,
                'shipment_status_id' => 1,
                'order_detail_number' => $i,
                'order_quantity' => 2,
                'shipment_date' => $dt->modify('+1 day')->format('Y-m-d H:i:s')
            ]);
        }
    }
}
