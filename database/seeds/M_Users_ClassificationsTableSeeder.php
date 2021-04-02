<?php

use Illuminate\Database\Seeder;

class M_Users_ClassificationsTableSeeder extends Seeder
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
                'id' => 1,
                'user_classification_name' => '管理者',
            ],
            [
                'id' => 2,
                'user_classification_name' => '一般',
            ],
        ]);
    }
}
