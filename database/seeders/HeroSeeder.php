<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder {
    public function run() {
        DB::table('heroes')->insert([
            ['name' => 'Aragorn', 'race' => 'Humano', 'rank' => 'Rey', 'realm_id' => 1, 'alive' => true],
            ['name' => 'Legolas', 'race' => 'Elfo', 'rank' => 'Arquero', 'realm_id' => 2, 'alive' => true],
            ['name' => 'Gimli', 'race' => 'Enano', 'rank' => 'Guerrero', 'realm_id' => 4, 'alive' => true],
            ['name' => 'Frodo', 'race' => 'Hobbit', 'rank' => 'Portador', 'realm_id' => 1, 'alive' => true],
        ]);
    }
}

