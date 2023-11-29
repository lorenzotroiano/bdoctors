<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {

        $usersData = include(database_path('seeds/users_data.php'));

        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
