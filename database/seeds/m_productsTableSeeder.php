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
                'delete_flag' => '0',
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
                'delete_flag' => '0',
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
                'delete_flag' => '0',
            ],
            [ 
                'product_name' => '風の森', 
                'category_id' => 4, 
                'price' => 2890, 
                'description' => '甘みと炭酸、味わいの両立、新しい日本酒', 
                'sale_status_id' => 1, 
                'product_status_id' => 4, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 1, 
                'delete_flag' => ''
            ], 
            [ 
                'product_name' => '十勝のバターハヤシライス', 
                'category_id' => 5, 
                'price' => 5800, 
                'description' => '生牛乳から作られたバターをふんだんに使用!10食セット☆', 
                'sale_status_id' => 3, 
                'product_status_id' => 1, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 2, 
                'delete_flag' => ''
            ], 
            [ 
                'product_name' => '爆発マトリョーシカ', 
                'category_id' => 6, 
                'price' => 288000, 
                'description' => 'どこかにC-4爆弾が入ってますよ！*死人が出ました', 
                'sale_status_id' => 2, 
                'product_status_id' => 4, 
                'regist_date' => date('Y-m-d H:i:s'), 
                'user_id' => 3, 
                'delete_flag' => ''
            ], 
        ]);
    }
}
