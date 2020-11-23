<?php

use Illuminate\Database\Seeder;

class MUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'password' => bcrypt('sample1'),
            'last_name' => '佐藤',
            'first_name' => '健',
            'zipcode' => '1111111',
            'prefecture' => '北海道',
            'municipality' => '札幌',
            'address' => '1-2-3',
            'apartments' => 'AAビル2F',
            'email' => 'sample1@sample.com',
            'phone_number' => '1111111111',
            'user_classfication' => '1',
            'company_name' => 'AA株式会社',
            'delete_flag' => '0'
        ]);
    }
}
