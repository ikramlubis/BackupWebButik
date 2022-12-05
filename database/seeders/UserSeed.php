<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username'           => 'admin',
                'email'          => 'admin@gmail.com',
                'password'       => bcrypt('12345678'),
                'remember_token' => NULL,
            ],
        ];

        User::insert($users);
    }
}
