<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Star;
use App\Models\Profile;

class StarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $starData = [
            ['vote' => '1'],
            ['vote' => '2'],
            ['vote' => '3'],
            ['vote' => '4'],
            ['vote' => '5'],
            ['vote' => '6'],
            ['vote' => '7'],
            ['vote' => '8'],
            ['vote' => '9'],
            ['vote' => '10'],

        ];

        foreach ($starData as $data) {
            Star::create($data);
        };

        $profiles = Profile::inRandomOrder()->limit(rand(1, 3))->get();

        $starVotes = array_column($starData, 'vote');

        $stars = Star::whereIn('vote', $starVotes)->get();

        foreach ($stars as $star) {
            $star->profiles()->attach($profiles);
        }
    }
}
