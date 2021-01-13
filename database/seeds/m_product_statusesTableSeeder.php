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
            'product_status_name' => 'test',
        ]);
    }
}
