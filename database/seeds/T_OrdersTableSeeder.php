<?php

use Illuminate\Database\Seeder;

class T_OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_orders')->insert([
            [
                'user_id' => 1,
                'order_number' => 1,
                'order_date' => date('2020-10-22 13:55:19'),
            ],
            [
                'user_id' => 1,
                'order_number' => 2,
                'order_date' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'order_number' => 3,
                'order_date' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '3',
                'order_number' => 4,
                'order_date' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '4',
                'order_number' => 5,
                'order_date' => date('Y-m-d H:i:s'),
            ],
        ]);
    }}
