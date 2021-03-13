<?php

use Illuminate\Database\Seeder;

class M_Shipment_StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_shipment_statuses')->insert([
            [
                'shipment_status_name' => '準備中',
            ],
            [
                'shipment_status_name' => '発送済',
            ],
            [
                'shipment_status_name' => '入荷待ち',
            ],
            [
                'shipment_status_name' => 'キャンセル',
            ],
        ]);
    }
}
