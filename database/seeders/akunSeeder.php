<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $users = [
            [
                'username' => 'admin',
                'name' => 'marhaenika',
                'address' => 'jl.kita',
                'phone_number' => '0872607189',
                'status' => '',
                'level' => 'admin',
                'password' => bcrypt('7260admin'),
            ],
            [
                'username' => 'kasir',
                'name' => 'marhaenika',
                'address' => 'jl.kita',
                'phone_number' => '0872607189',
                'status' => '',
                'level' => 'kasir',
                'password' => bcrypt('7260kasir'),
            ],
            [
                'username' => 'manager',
                'name' => 'marhaenika',
                'address' => 'jl.kita',
                'phone_number' => '0872607189',
                'status' => '',
                'level' => 'manager',
                'password' => bcrypt('7260manager'),
            ],
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
