<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatureSeeder extends Seeder {
    public function run() {
        DB::table('creatures')->insert([
            ['name' => 'Balrog', 'species' => 'Demonio', 'threat_level' => 10, 'region_id' => 2],
            ['name' => 'Nazgûl', 'species' => 'Espectro', 'threat_level' => 9, 'region_id' => 3],
            ['name' => 'Warg', 'species' => 'Lobo', 'threat_level' => 6, 'region_id' => 2],
            ['name' => 'Troll', 'species' => 'Troll', 'threat_level' => 7, 'region_id' => 5],
        ]);
    }
}

