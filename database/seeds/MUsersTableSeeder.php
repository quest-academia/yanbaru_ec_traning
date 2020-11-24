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
        DB::table('m_users')->insert([
            'password' => bcrypt('sample1'),
            'last_name' => '山本',
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
        DB::table('m_users')->insert([
            'password' => bcrypt('sample2'),
            'last_name' => '熊本',
            'first_name' => '健',
            'zipcode' => '2222222',
            'prefecture' => '熊本県',
            'municipality' => '熊本市',
            'address' => '1-2-3',
            'apartments' => 'BBビル2F',
            'email' => 'sample2@sample.com',
            'phone_number' => '2222222222',
            'user_classfication' => '1',
            'company_name' => 'AA株式会社',
            'delete_flag' => '0'
        ]);
    }
}
