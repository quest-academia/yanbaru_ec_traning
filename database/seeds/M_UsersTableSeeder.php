<?php

use Illuminate\Database\Seeder;

class M_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_users')->insert([
            'password' => 'sample',
            'last_name' => 'sample_L_name',
            'first_name' => 'sample_F_name',
            'zipcode' => 2710056,
            'prefecture' => '千葉県',
            'municipality' => '松戸市',
            'address' => '111111',
            'apartments' => 'sampleマンション',
            'email' => 'sample@sample.co.jp',
            'phone_number' => 01234567,
            'user_classification_id' => 2,
            'company_name' => 'sample株式会社',
        ]);
    }
}
