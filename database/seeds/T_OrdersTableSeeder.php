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
            'user_id' => '01',
            'order_date' => new DateTime()
        ]);
    }
}
