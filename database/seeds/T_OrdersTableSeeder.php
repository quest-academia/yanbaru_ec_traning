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
        $dt = new DateTime();
        for ($i = 1; $i <= 20; $i++) {
            DB::table('t_orders')->insert([
                'user_id' => 1
                ,'order_date' => $dt->format('Y-m-d H:i:s')
            ]);
        }
        $dtbefore = $dt->modify('-100 day');
        for ($i = 1; $i <= 10; $i++) {
            DB::table('t_orders')->insert([
                'user_id' => 1
                ,'order_date' => $dtbefore->format('Y-m-d H:i:s')
            ]);
        }
    }
}
