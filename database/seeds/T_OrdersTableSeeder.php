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
        for ($i = 1; $i <= 3; $i++) {
            DB::table('t_orders')->insert([
                'user_id' => $i
                ,'order_date' => $dt->modify('+1 day')->format('Y-m-d H:i:s')
            ]);
        }
    }
}
