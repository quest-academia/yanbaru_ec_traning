<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'last_name' => 'sample1',
            'first_name' => 'sample11',

            'password' => bcrypt('sample1'),
            'zipcode' => '1111111',
            'prefecture' => '北海道',
            'municipality' => '札幌',
            'address' => '1-2-3',
            'apartments' => 'AAビル2F',
            'email' => 'sample1@sample.com',
            'phone_number' => '1111111111',
            'user_classfication' => '1',
            'company_name' => 'AA株式会社',
            'delete_flag' => ''
        ]);
        DB::table('users')->insert([
            'last_name' => 'sample2',
            'first_name' => 'sample22',
            'email' => 'sample2@sample.com',
            'password' => bcrypt('sample2')
        ]);
        DB::table('users')->insert([
            'last_name' => 'sample3',
            'first_name' => 'sample33',
            'email' => 'sample3@sample.com',
            'password' => bcrypt('sample3')
        ]);
        DB::table('users')->insert([
            'last_name' => 'sample4',
            'first_name' => 'sample44',
            'email' => 'sample4@sample.com',
            'password' => bcrypt('sample4')
        ]);
        DB::table('users')->insert([
            'last_name' => 'sample5',
            'first_name' => 'sample55',
            'email' => 'sample5@sample.com',
            'password' => bcrypt('sample5')
        ]);
    }
}
