<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@domain.com',
                'password' => bcrypt('123')
            ],
        ]);
    }
}
