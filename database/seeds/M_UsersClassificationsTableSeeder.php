<?php

use Illuminate\Database\Seeder;

class M_UsersClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '出品者',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '出品者',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '購入者',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '管理者',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '購入者',
        ]);
    }
}
