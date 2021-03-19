<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PurchasesTableSeeder::class);
        $this->call(M_UsersTableSeeder::class);
        $this->call(M_Users_ClassificationsTableSeeder::class);
    }
}
