<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(T_OrdersTableSeeder::class);
        $this->call(T_OrdersDetailsTableSeeder::class);
        $this->call(M_ShipmentsStatusesTableSeeder::class);
    }
}
