<?php

use Illuminate\Database\Seeder;

class M_User_ClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_user_classifications')->insert([
            [
                'user_classification_name' => '出品者',
            ],
            [
                'user_classification_name' => '購入者',
            ],
            [
                'user_classification_name' => '管理者',
            ],
        ]);
    }
}
