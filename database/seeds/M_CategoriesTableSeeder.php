<?php

use Illuminate\Database\Seeder;

class M_CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_categories')->insert([
            [
                'id' => 1,
                'category_name' => '沖縄',
            ],
            [
                'id' => 2,
                'category_name' => '北海道',
            ],
            [
                'id' => 3,
                'category_name' => '東京',
            ],
            [
                'id' => 4,
                'category_name' => '大阪',
            ],
            [
                'id' => 5,
                'category_name' => '名古屋',
            ],
            [
                'id' => 6,
                'category_name' => '福岡',
            ],
        ]);

    }
}
