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
            'last_name' => '坂本',
            'first_name' => '健',
            'zipcode' => '1111111',
            'prefecture' => '北海道',
            'municipality' => '札幌',
            'address' => '1-2-3',
            'apartments' => 'テナントA',
            'email' => 'sample1@sample.com',
            'phone_number' => '1111111111',
            'user_classification_id' => '1',
            'company_name' => '寿司処　柳',
            'delete_flag' => '0'
        ]);
        DB::table('m_users')->insert([
            'password' => bcrypt('sample2'),
            'last_name' => '宮代',
            'first_name' => '邦夫',
            'zipcode' => '2222222',
            'prefecture' => '熊本県',
            'municipality' => '熊本市',
            'address' => '1-2-3',
            'apartments' => 'テナントB',
            'email' => 'sample2@sample.com',
            'phone_number' => '2222222222',
            'user_classification_id' => '1',
            'company_name' => '宮代精肉店',
            'delete_flag' => '0'
        ]);

        DB::table('m_users')->insert([
            'password' => bcrypt('sample3'),
            'last_name' => '神田',
            'first_name' => '彩香',
            'zipcode' => '3333333',
            'prefecture' => '神奈川県',
            'municipality' => '横浜市',
            'address' => '1-2-3',
            'apartments' => 'CCビル1F',
            'email' => 'sample3@sample.com',
            'phone_number' => '3333333333',
            'user_classification_id' => '1',
            'company_name' => 'Cafe de normal',
            'delete_flag' => '0'
        ]);
        DB::table('m_users')->insert([
            'password' => bcrypt('sample4'),
            'last_name' => '本田',
            'first_name' => '稜典',
            'zipcode' => '4444444',
            'prefecture' => '大阪府',
            'municipality' => '大阪市',
            'address' => '1-2-3',
            'apartments' => 'DDビルB1階',
            'email' => 'sample4@sample.com',
            'phone_number' => '4444444444',
            'user_classification_id' => '1',
            'company_name' => '居酒屋瀧',
            'delete_flag' => '0'
        ]);
        DB::table('m_users')->insert([
            'password' => bcrypt('sample5'),
            'last_name' => '佐藤',
            'first_name' => '裕太',
            'zipcode' => '5555555',
            'prefecture' => '東京',
            'municipality' => '千代田区',
            'address' => '1-2-3',
            'apartments' => 'EEビル1F',
            'email' => 'sample5@sample.com',
            'phone_number' => '5555555555',
            'user_classification_id' => '1',
            'company_name' => '六花製菓',
            'delete_flag' => '0'
        ]);
    }
}
