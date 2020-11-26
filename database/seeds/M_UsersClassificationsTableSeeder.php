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
            'user_classification_name' => '魚',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '肉',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => 'カフェ',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '居酒屋',
        ]);
        DB::table('m_users_classifications')->insert([
            'user_classification_name' => '製菓',
        ]);
    }
}
