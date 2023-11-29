<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;
use App\Models\Profile;
use App\Models\ProfileSponsorship;




class ProfileSponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::all();
        $sponsorship = Sponsorship::all();


        ProfileSponsorship::create([
            "profile_id" => 1,
            "sponsorship_id" => 2,
            "data_inizio" => "2023-07-11",
            "data_fine" => "2024-08-11",


        ]);

        ProfileSponsorship::create([
            "profile_id" => 2,
            "sponsorship_id" => 3,
            "data_inizio" => "2023-06-22",
            "data_fine" => "2024-09-22",


        ]);

        ProfileSponsorship::create([
            "profile_id" => 3,
            "sponsorship_id" => 3,
            "data_inizio" => "2023-07-11",
            "data_fine" => "2024-08-11",


        ]);

        ProfileSponsorship::create([
            "profile_id" => 4,
            "sponsorship_id" => 1,
            "data_inizio" => "2023-07-11",
            "data_fine" => "2024-08-11",


        ]);

    }
}
