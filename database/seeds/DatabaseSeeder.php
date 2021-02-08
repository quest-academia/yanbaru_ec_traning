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
            
            M_User_ClassificationsTableSeeder::class,
            M_Users_TableSeeder::class,
            T_OrdersTableSeeder::class,
            m_categoriesTableSeeder::class,
            m_sale_statusesTableSeeder::class,
            m_product_statusesTableSeeder::class,
            m_productsTableSeeder::class,
            M_Shipment_StatusesTableSeeder::class,
            T_Order_DetailsTableSeeder::class,
            T_purchaseTableSeeder::class,
        ]);
    }
}
