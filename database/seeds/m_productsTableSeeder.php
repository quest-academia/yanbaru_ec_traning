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
                'product_name' => 'チョコレート', 
                'category_id' => 4, 
                'price' => 120, 
                'description' => 'カカオ50%香り味わう。', 
                'sale_status_id' => 1, 
                'product_status_id' => 4, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 1, 
                'delete_flag' => '0'
            ], 
            [ 
                'product_name' => 'ストゼロ まるごとアセロラ', 
                'category_id' => 5, 
                'price' => 158, 
                'description' => 'プリン体 糖質ゼロ', 
                'sale_status_id' => 3, 
                'product_status_id' => 1, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 2, 
                'delete_flag' => '0'
            ], 
            [ 
                'product_name' => 'いい感じの置物', 
                'category_id' => 6, 
                'price' => 30000, 
                'description' => 'なんかいい感じがする置物。', 
                'sale_status_id' => 2, 
                'product_status_id' => 4, 
                'regist_date' => date('Y-m-d H:i:s'), 
                'user_id' => 3, 
                'delete_flag' => '0'
            ], 
        ]);
    }
}
