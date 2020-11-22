<?php

use Illuminate\Database\Seeder;

class M_Sales_StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sales_statuses')->insert([
            'sale_status_id' => 1,
            'sale_status_name' => '残あり',
         ]);
        DB::table('m_sales_statuses')->insert([
            'sale_status_id' => 2,
            'sale_status_name' => '品切れ',
         ]);
    }
}
