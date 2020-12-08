<?php

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
            'id' => 1,
            'purchase_price' => 2400,
            'purchase_quantity' => 100,
            'purchase_company' => 'やんばる牧場',
            'order_date' => date("Y/m/d H:i:s", strtotime('+2 day')) . "\n",
            'purchase_date' => date("Y/m/d H:i:s", strtotime('+3 day')) . "\n",
            'product_id' => 1,

        ]);
        DB::table('t_purchases')->insert([
            'id' => 2,
            'purchase_price' => 3600,
            'purchase_quantity' => 50,
            'purchase_company' => 'やんばるファーム',
            'order_date' => date("Y/m/d H:i:s", strtotime('+2 day')) . "\n",
            'purchase_date' => date("Y/m/d H:i:s", strtotime('+3 day')) . "\n",
            'product_id' => 2,

        ]);
        DB::table('t_purchases')->insert([
            'id' => 3,
            'purchase_price' => 1500,
            'purchase_quantity' => 120,
            'purchase_company' => 'やんばるファーム',
            'order_date' => date("Y/m/d H:i:s", strtotime('+2 day')) . "\n",
            'purchase_date' => date("Y/m/d H:i:s", strtotime('+3 day')) . "\n",
            'product_id' => 3,

        ]);
        DB::table('t_purchases')->insert([
            'id' => 4,
            'purchase_price' => 1800,
            'purchase_quantity' => 70,
            'purchase_company' => 'やんばる水産',
            'order_date' => date("Y/m/d H:i:s", strtotime('+2 day')) . "\n",
            'purchase_date' => date("Y/m/d H:i:s", strtotime('+3 day')) . "\n",
            'product_id' => 4,

        ]);
        DB::table('t_purchases')->insert([
            'id' => 5,
            'purchase_price' => 1200,
            'purchase_quantity' => 50,
            'purchase_company' => 'やんばる水産',
            'order_date' => date("Y/m/d H:i:s", strtotime('+2 day')) . "\n",
            'purchase_date' => date("Y/m/d H:i:s", strtotime('+3 day')) . "\n",
            'product_id' => 5,

        ]);
    }
}
