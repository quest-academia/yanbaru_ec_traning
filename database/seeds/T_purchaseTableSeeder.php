<?php

use Illuminate\Database\Seeder;

class T_purchaseTableSeeder extends Seeder
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
                'purchase_price' => '100',
                'purchase_quantity' => '1',
                'purchase_company' => '仕入先会社1',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => '1'
            ],

            [
                'purchase_price' => '200',
                'purchase_quantity' => '2',
                'purchase_company' => '仕入先会社2',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => '2'
            ],

            [
                'purchase_price' => '300',
                'purchase_quantity' => '3',
                'purchase_company' => '仕入先会社3',
                'order_date' => date('Y-m-d H:i:s'),
                'purchase_date' => date('Y-m-d H:i:s'),
                'product_id' => '3'
            ],

            // [
            //     'purchase_price' => '400',
            //     'purchase_quantity' => '1',
            //     'purchase_company' => '仕入先会社4',
            //     'order_date' => date('Y-m-d H:i:s'),
            //     'purchase_date' => date('Y-m-d H:i:s'),
            //     'product_id' => '4'
            // ],

            // [
            //     'purchase_price' => '500',
            //     'purchase_quantity' => '5',
            //     'purchase_company' => '仕入先会社5',
            //     'order_date' => date('Y-m-d H:i:s'),
            //     'purchase_date' => date('Y-m-d H:i:s'),
            //     'product_id' => '5'
            // ],
        ]);

    }
}
