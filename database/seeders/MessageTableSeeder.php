<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::all();

        Message::create([
            "profile_id" => 1,
            "name" => "Piero",
            "lastname" => "cipollo",
            "email" => "piero.cipollo@user.com",
            "text" => "ciao! sono interessato a farmi visitare",

        ]);

        Message::create([
            "profile_id" => 1,
            "name" => "Luca",
            "lastname" => "Lattuga",
            "email" => "luca.lattuga@user.com",
            "text" => "oh mio dio mi fa male qui! dottore mi aiuti",

        ]);



    }
}
