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
            [
                'product_name' => '1',
                'category_id' => '1',
                'price' => '1000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '1',
            ],
            [
                'product_name' => '2',
                'category_id' => '2',
                'price' => '2000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '2',
                'product_status_id' => '2',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '2',
                'delete_flag' => '2',
            ],
            [
                'product_name' => '3',
                'category_id' => '3',
                'price' => '3000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '3',
                'product_status_id' => '3',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '3',
                'delete_flag' => '3',
            ],
            [
                'product_name' => '4',
                'category_id' => '4',
                'price' => '4000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '4',
                'product_status_id' => '4',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '4',
                'delete_flag' => '4',
            ],
            [
                'product_name' => '5',
                'category_id' => '5',
                'price' => '5000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '5',
                'product_status_id' => '5',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '5',
                'delete_flag' => '5',
            ],
        ]);
    }
}
