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
            'id' => 1,
            'product_status_name' => '在庫有',
         ]);
        DB::table('m_products_statuses')->insert([
            'id' => 2,
            'product_status_name' => '在庫無',
         ]);
         DB::table('m_products_statuses')->insert([
            'id' => 3,
            'product_status_name' => '入荷待ち',
         ]);
         DB::table('m_products_statuses')->insert([
            'id' => 4,
            'product_status_name' => '入荷未定',
         ]);
    }
}
