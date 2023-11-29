<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsorship::create([
            'name' => 'Economy',
            'price' => 2.99,
            'duration' => 1,
        ]);

        Sponsorship::create([
            'name' => 'Standard',
            'price' => 4.99,
            'duration' => 4,
        ]);

        Sponsorship::create([
            'name' => 'Premium',
            'price' => 8.99,
            'duration' => 7,
        ]);
    }
}
