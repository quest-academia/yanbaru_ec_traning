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
            'id' => 1,
            'sale_status_name' => '販売中',
         ]);
        DB::table('m_sales_statuses')->insert([
            'id' => 2,
            'sale_status_name' => '販売中止',
         ]);
         DB::table('m_sales_statuses')->insert([
            'id' => 3,
            'sale_status_name' => '予約受付中',
         ]);
    }
}
