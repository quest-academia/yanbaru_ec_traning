<?php

use Illuminate\Database\Seeder;

class m_productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_products')->insert([
            'product_name' => '1',
            'category_id' => '1',
            'price' => '1000',
            'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
            'sale_status_id' => '1',
            'product_status_id' => '1',
            'regist_date' => date('Y-m-d H:i:s'),
            'user_id' => '1',
            'delete_flag' => '1',
        ]);
    }
}
