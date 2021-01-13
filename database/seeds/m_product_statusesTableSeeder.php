<?php

use Illuminate\Database\Seeder;

class m_product_statusesTableSeeder extends Seeder
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
                'product_status_name' => '在庫あり',
            ],
            [
                'product_status_name' => '品切れ中',
            ],
            [
                'product_status_name' => '入荷待ち',
            ],
            [
                'product_status_name' => '入荷未定',
            ],
        ]);
    }
}
