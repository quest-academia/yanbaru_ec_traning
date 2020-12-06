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
        $this->call(M_Sales_StatusesSeeder::class);
        $this->call(M_CategoriesSeeder::class);
        $this->call(M_Products_StatusesSeeder::class);
        $this->call(M_ProductsSeeder::class);
        $this->call(M_UsersClassificationsTableSeeder::class);
        $this->call(M_UsersTableSeeder::class);
        $this->call(M_ShipmentsStatusesTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(T_OrdersTableSeeder::class);
        $this->call(T_OrdersDetailsTableSeeder::class);
    }
}
