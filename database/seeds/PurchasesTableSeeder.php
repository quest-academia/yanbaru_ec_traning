<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_purchases')->insert([
            'purchase_price' => 10000,
            'purchase_quantity' => 10,
            'purchase_company' => 'やんばる株式会社',
            'order_date' => Carbon::yesterday(),
            'purchase_date' => Carbon::now(),
            'product_id' => '1',
        ]);
    }
}
