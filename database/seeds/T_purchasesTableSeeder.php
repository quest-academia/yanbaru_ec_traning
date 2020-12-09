<?php

use Illuminate\Database\Seeder;

class T_purchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_purchases')->insert([
            'purchase_price' => '1000',
            'purchase_quantity' => '10',
            'purchase_company' => 'じゃがりこ株式会社',
            'order_date' => '10/01',
            'purchase_date' => '11/11',
            'product_id' => '1',
        ]);
        DB::table('t_purchases')->insert([
            'purchase_price' => '2000',
            'purchase_quantity' => '20',
            'purchase_company' => 'じゃがりこ2株式会社',
            'order_date' => '02/02',
            'purchase_date' => '02/22',
            'product_id' => '2',
        ]);
        DB::table('t_purchases')->insert([
            'purchase_price' => '3000',
            'purchase_quantity' => '30',
            'purchase_company' => 'じゃがりこ株式会社',
            'order_date' => '03/03',
            'purchase_date' => '03/03',
            'product_id' => '3',
        ]);
    }
}
