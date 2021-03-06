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
                'product_name' => '萩の月',
                'category_id' => '3',
                'price' => '100',
                'description' => 'かしょおーさんぜーん',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '4',
                'delete_flag' => '0',
            ],
            [
                'product_name' => 'ビタミンB郡',
                'category_id' => '3',
                'price' => '860',
                'description' => '８種のビタミンB郡を一粒で簡単補給',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '4',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '骨伝導ヘッドホン',
                'category_id' => '5',
                'price' => '19800',
                'description' => '耳を塞がずに音楽を楽しめる',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '4',
                'delete_flag' => '0',
            ],
            [ 
                'product_name' => 'チョコレート', 
                'category_id' => '3', 
                'price' => '120', 
                'description' => 'カカオ50%香り味わう。', 
                'sale_status_id' => '1', 
                'product_status_id' => '2', 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => '4', 
                'delete_flag' => '0'
            ], 
            [ 
                'product_name' => 'ストゼロ まるごとアセロラ', 
                'category_id' => '5', 
                'price' => '158', 
                'description' => 'プリン体 糖質ゼロ', 
                'sale_status_id' => '1', 
                'product_status_id' => '1', 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => '4', 
                'delete_flag' => '0'
            ], 
            [ 
                'product_name' => 'いい感じの置物', 
                'category_id' => '6', 
                'price' => '30000', 
                'description' => 'なんかいい感じがする置物。', 
                'sale_status_id' => '2', 
                'product_status_id' => '4', 
                'regist_date' => date('Y-m-d H:i:s'), 
                'user_id' => '4', 
                'delete_flag' => '0'
            ], 
        ]);
    }
}
