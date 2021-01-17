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
            m_categoriesTableSeeder::class,
            m_sale_statusesTableSeeder::class,
            m_product_statusesTableSeeder::class,
            m_productsTableSeeder::class,
            T_purchaseTableSeeder::class,
            M_User_ClassificationsTableSeeder::class,
            M_UsersTableSeeder::class,
        ]);
    }
}
