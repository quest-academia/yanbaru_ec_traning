<?php

use Illuminate\Database\Seeder;

class M_Products_StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_products_statuses')->insert([
            'product_status_id' => 1,
            'product_status_name' => '良品',
         ]);
        DB::table('m_products_statuses')->insert([
            'product_status_id' => 2,
            'product_status_name' => '期限間近',
         ]);
    }
}
