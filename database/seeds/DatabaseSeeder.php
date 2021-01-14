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
        $this->call([
            M_Shipment_StatusesTableSeeder::class,
            T_OrdersTableSeeder::class,
            T_Order_DetailsTableSeeder::class,
        ]);
    }
}
