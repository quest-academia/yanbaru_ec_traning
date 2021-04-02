<?php

use Illuminate\Database\Seeder;

class M_Products_TableSeeder extends Seeder
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
                'product_name' => 'やんばるチキン',
                'category_id' => 1,
                'price' => 3480,
                'description' => '沖縄の高級地鶏を使ったパサつきがなくみずみずしい最高のチキン。',
                'sale_status_id' => 1,
                'product_status_id' => 1,
                'regist_date' => new DateTime(),
                'user_id' => 1,
            ],
            [
                'product_name' => 'ジンギスカン',
                'category_id' => 2,
                'price' => 12000,
                'description' => '１番人気の特上ラムセット。',
                'sale_status_id' => 1,
                'product_status_id' => 1,
                'regist_date' => new DateTime(),
                'user_id' => 1,
            ],
            [
                'product_name' => '【高級】 江戸前握り寿司',
                'category_id' => 3,
                'price' => 220000,
                'description' => '銀座で時代を握ってきた、江戸前の粋と誇りを食す。',
                'sale_status_id' => 1,
                'product_status_id' => 1,
                'regist_date' => new DateTime(),
                'user_id' => 1,
            ],
            [
                'product_name' => '特製たこ焼セット',
                'category_id' => 4,
                'price' => 10,
                'description' => 'この価格は今だけ!本場の味がお取り寄せで味わえます。',
                'sale_status_id' => 2,
                'product_status_id' => 1,
                'regist_date' => new DateTime(),
                'user_id' => 1,
            ],
            [
                'product_name' => '【国産うなぎ】 名古屋名物うな富士　肝入ひつまぶし',
                'category_id' => 5,
                'price' => 7800,
                'description' => 'お店で1本1本こだわりの手焼き。',
                'sale_status_id' => 1,
                'product_status_id' => 1,
                'regist_date' => new DateTime(),
                'user_id' => 1,
            ],
            [
                'product_name' => 'むなかた牛 塩もつ鍋セット',
                'category_id' => 6,
                'price' => 3480,
                'description' => 'ふるさと納税サイト「ふるさとチョイス」ににて「鍋部門ランキング」全国1位も獲得した「むなかた牛塩もつ鍋セット」。',
                'sale_status_id' => 1,
                'product_status_id' => 1,
                'regist_date' => new DateTime(),
                'user_id' => 1,
            ],
        ]);
    }
}
