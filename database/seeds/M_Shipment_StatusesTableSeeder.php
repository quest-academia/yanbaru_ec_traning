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
                'id' => 1,
                'shipment_status_name' => '発送準備中'
            ],
            [
                'id' => 2,
                'shipment_status_name' => '発送中'
            ],
            [
                'id' => 3,
                'shipment_status_name' => '発送済'
            ],
            [
                'id' => 4,
                'shipment_status_name' => '配達準備中'
            ],
            [
                'id' => 5,
                'shipment_status_name' => '配達中'
            ],
            [
                'id' => 6,
                'shipment_status_name' => '配達済'
            ],
        ]);
    }
}
