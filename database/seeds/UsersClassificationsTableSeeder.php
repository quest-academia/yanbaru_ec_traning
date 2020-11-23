<?php

use Illuminate\Database\Seeder;

class UsersClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_users_classifications')->insert(
            [
               'user_classification_id' => '1',
               'user_classification_name' => '一般' ,
            ]
        );
        DB::table('m_users_classifications')->insert(
            [
                'user_classification_id' => '2',
                'user_classification_name' => '特別' ,
            ]
        );
        DB::table('m_users_classifications')->insert(
            [
                'user_classification_id' => '3',
                'user_classification_name' => 'ゲスト' ,
            ]
        );
    }
}
