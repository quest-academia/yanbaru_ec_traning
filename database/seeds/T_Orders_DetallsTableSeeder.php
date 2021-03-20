<?php

use Illuminate\Database\Seeder;

class T_Orders_DetallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_orders_detalls')->insert([
            'products_id' => '001',
            'order_id' => '0001',
            'shipment_status_id' => '00001',
            'order_detail_number' => '000001',
            'order_quantity' => '1',
            'shipment_date' => new DateTime()
        ]);
    }
}
