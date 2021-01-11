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
            ['shipment_status_name' => '注文を受付いたしました',
            ],
            ['shipment_status_name' => '発送準備中です',
            ],
            ['shipment_status_name' => '商品が発送されました',
            ],
        ]);
    }
}
