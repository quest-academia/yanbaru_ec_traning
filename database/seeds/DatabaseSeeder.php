<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 注文テーブルへのシーディング
        $this->call(T_OrdersTableSeeder::class);
        // 注文詳細テーブルへのシーディング
        $this->call(T_OrdersDetailsTableSeeder::class);
        // 発送状態テーブルへのシーディング
        $this->call(M_ShipmentsStatusesTableSeeder::class);
    }
}
