<?php

use Illuminate\Database\Seeder;

class M_ShipmentsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 発送状態のステータスを配列に定義
        $shipment_status = ['注文完了','支払い完了','発送処理中','発送済み'];
        foreach ($shipment_status as $status) {
            DB::table('m_shipments_statuses')->insert([
                'shipment_status_name' => $status
            ]);
        };
    }
}
