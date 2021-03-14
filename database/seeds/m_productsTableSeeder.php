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
                'product_name' => 'ビタミンB群サプリ',
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
            [
                'product_name' => '食器用洗剤',
                'category_id' => '2',
                'price' => '300',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '柔軟剤',
                'category_id' => '2',
                'price' => '500',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => 'ハンガー',
                'category_id' => '2',
                'price' => '300',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => 'バスタオル',
                'category_id' => '2',
                'price' => '600',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => 'レタス',
                'category_id' => '3',
                'price' => '250',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '牛乳',
                'category_id' => '3',
                'price' => '150',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '納豆',
                'category_id' => '3',
                'price' => '80',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '鳥もも肉',
                'category_id' => '3',
                'price' => '1050',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '胃薬',
                'category_id' => '1',
                'price' => '3500',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '目薬',
                'category_id' => '1',
                'price' => '3500',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '掃除機',
                'category_id' => '5',
                'price' => '18000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => '炊飯器',
                'category_id' => '5',
                'price' => '12500',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => 'タンクトップ',
                'category_id' => '8',
                'price' => '1000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => 'パーカー',
                'category_id' => '8',
                'price' => '2000',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
            [
                'product_name' => 'ネクタイ',
                'category_id' => '8',
                'price' => '1500',
                'description' => '製品情報が入ります｡製品情報が入ります｡製品情報が入ります｡',
                'sale_status_id' => '1',
                'product_status_id' => '1',
                'regist_date' => date('Y-m-d H:i:s'),
                'user_id' => '1',
                'delete_flag' => '0',
            ],
        ]);
    }
}
