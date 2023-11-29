<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Profile;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::all();

        Review::create([
            "profile_id" => 1,
            "name" => "Piero",
            "lastname" => "cipollo",
            "email" => "piero.cipollo@user.com",
            "text" => "davvero bravo!",

        ]);

        Review::create([
            "profile_id" => 1,
            "name" => "Luca",
            "lastname" => "Lattuga",
            "email" => "luca.lattuga@user.com",
            "text" => "non ci tornerò mai più!",

        ]);

    }
}
