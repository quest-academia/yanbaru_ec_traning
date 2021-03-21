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
            'product_name' => 'やんばるチキン',
            'category_id' => '1',
            'price' => 3480,
            'description' => '沖縄の高級地鶏を使ったパサつきがなくみずみずしい最高のチキンです。',
            'sale_status_id' => '1',
            'product_status_id' => '1',
            'regist_date' => new DateTime(),
            'user_id' => '1',
        ]);
    }
}
