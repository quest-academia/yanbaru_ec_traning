<?php

use Illuminate\Database\Seeder;

class M_Product_StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_product_statuses')->insert([
            [
                'id' => 1,
                'product_status_name' => '通常商品',
            ],
            [
                'id' => 2,
                'product_status_name' => '今だけお得商品',
            ],
        ]);

    }
}
