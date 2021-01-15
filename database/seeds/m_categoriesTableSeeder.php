<?php

use Illuminate\Database\Seeder;

class m_categoriesTableSeeder extends Seeder
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
                'category_name' => '医薬品',
            ],
            [
                'category_name' => '日用品',
            ],
            [
                'category_name' => '食料品',
            ],
            [
                'category_name' => '事務用品',
            ],
            [
                'category_name' => '電化製品',
            ],
            [
                'category_name' => '書籍',
            ],
            [
                'category_name' => '宝飾品',
            ],
            [
                'category_name' => '衣服',
            ],
        ]);
    }
}
