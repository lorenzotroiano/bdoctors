<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologyData = [
            ['name' => 'Cardiologia'],
            ['name' => 'Dermatologia'],
            ['name' => 'Endocrinologia'],
            ['name' => 'Gastroenterologia'],
            ['name' => 'Nefrologia'],
            ['name' => 'Neurologia'],
            ['name' => 'Oncologia'],
            ['name' => 'Pediatria'],
            ['name' => 'Reumatologia'],
            ['name' => 'Chirurgia'],
        ];

        foreach ($typologyData as $data) {
            Typology::create($data);
        };

        $profiles = Profile::inRandomOrder()->limit(rand(1, 3))->get();

        $typologyNames = array_column($typologyData, 'name');

        $typologies = Typology::whereIn('name', $typologyNames)->get();

        foreach ($typologies as $typology) {
            $typology->profiles()->attach($profiles);
        }
    }
}
