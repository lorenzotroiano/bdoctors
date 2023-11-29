<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $key => $user) {
            Profile::create([
                "user_id" => $user->id,
                "description" => "descrizione " . $key,
                "services" => "oculista",
                "address" => "Via Garibaldi 28",
                "photo" => "xxx",
                "visible" => true,

            ]);


        }
    }
}
