<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Safira Arinta',
                'email' => 'safira@gmail.com',
                'password' => '1234',
                'remember_token' => '',
            ],
            [
                'name' => 'Helmi Nizar',
                'email' => 'helmi@gmail.com',
                'password' => '4321',
                'remember_token' => '',
            ],
            [
                'name' => 'Devina Aprilia',
                'email' => 'devina@gmail.com',
                'password' => '123',
                'remember_token' => '',
            ],
        ]);
    }
}
