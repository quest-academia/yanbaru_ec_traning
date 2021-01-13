<?php

use Illuminate\Database\Seeder;

class m_sale_statusesTableSeeder extends Seeder
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
                'sale_status_name' => '販売中',
            ],
            [
                'sale_status_name' => '販売中止',
            ],
            [
                'sale_status_name' => '予約受付中',
            ],
        ]);
    }
}
