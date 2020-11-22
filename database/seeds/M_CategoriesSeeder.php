<?php

use Illuminate\Database\Seeder;

class M_CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_categories')->insert([
            'category_id' => 1,
            'category_name' => '肉類',
         ]);
        DB::table('m_categories')->insert([
            'category_id' => 2,
            'category_name' => '魚介類',
         ]);
    }
}
