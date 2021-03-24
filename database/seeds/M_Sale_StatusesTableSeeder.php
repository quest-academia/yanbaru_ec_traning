<?php

use Illuminate\Database\Seeder;

class M_Sale_StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sale_statuses')->insert([
            [
                'id' => 1,
                'sale_status_name' => '在庫あり',
            ],
            [
                'id' => 2,
                'sale_status_name' => '残りわずか',
            ],
            [
                'id' => 3,
                'sale_status_name' => '完売',
            ],
        ]);

    }
}
