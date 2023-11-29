<?php

namespace Database\Seeders;

use App\Models\ProfileSponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            UserTableSeeder::class,
            ProfileTableSeeder::class,
            ReviewTableSeeder::class,
            StarTableSeeder::class,
            MessageTableSeeder::class,
            SponsorshipTableSeeder::class,
            ProfileSponsorshipTableSeeder::class,
        ]);


    }
}
