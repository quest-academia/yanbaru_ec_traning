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
            'user_classification_name' => 'sample1'
        ]);
    }
}
