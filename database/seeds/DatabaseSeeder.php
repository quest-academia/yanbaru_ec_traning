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
        $this->call(M_Users_ClassificationsTableSeeder::class);
        $this->call(M_UsersTableSeeder::class);
        $this->call(T_OrdersTableSeeder::class);
        $this->call(M_Shipment_StatusesTableSeeder::class);
        $this->call(M_CategoriesTableSeeder::class);
        $this->call(M_Sale_StatusesTableSeeder::class);        
        $this->call(M_Product_StatusesTableSeeder::class);
        $this->call(M_Products_TableSeeder::class);
        $this->call(T_Orders_DetailsTableSeeder::class);
        $this->call(T_PurchasesTableSeeder::class);
    }
}
