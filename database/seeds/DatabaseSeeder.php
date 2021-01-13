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
        $this->call(m_categoriesTableSeeder::class);
        $this->call(m_product_statusesTableSeeder::class);
        $this->call(m_sale_statusesTableSeeder::class);
    }
}
