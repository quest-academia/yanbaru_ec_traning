<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class T_PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_purchases')->insert([
            [
                'purchase_price' => 1000,
                'purchase_quantity' => 10,
                'purchase_company' => 'やんばる株式会社',
                'order_date' => Carbon::yesterday(),
                'purchase_date' => Carbon::now(),
                'product_id' => '1',
            ],
            [
                'purchase_price' => 10000,
                'purchase_quantity' => 10,
                'purchase_company' => 'えぞ株式会社',
                'order_date' => Carbon::yesterday(),
                'purchase_date' => Carbon::now(),
                'product_id' => '2',
            ],
            [
                'purchase_price' => 10000,
                'purchase_quantity' => 5,
                'purchase_company' => 'えど株式会社',
                'order_date' => Carbon::yesterday(),
                'purchase_date' => Carbon::now(),
                'product_id' => '3',
            ],
            [
                'purchase_price' => 500,
                'purchase_quantity' => 15,
                'purchase_company' => 'なんでやねん株式会社',
                'order_date' => Carbon::yesterday(),
                'purchase_date' => Carbon::now(),
                'product_id' => '4',
            ],
            [
                'purchase_price' => 3000,
                'purchase_quantity' => 10,
                'purchase_company' => 'しゃちほこ株式会社',
                'order_date' => Carbon::yesterday(),
                'purchase_date' => Carbon::now(),
                'product_id' => '5',
            ],
            [
                'purchase_price' => 1000,
                'purchase_quantity' => 10,
                'purchase_company' => 'はかた株式会社',
                'order_date' => Carbon::yesterday(),
                'purchase_date' => Carbon::now(),
                'product_id' => '6',
            ],
        ]);
    }
}
