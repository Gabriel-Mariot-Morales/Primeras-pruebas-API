<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealmSeeder extends Seeder {
    public function run() {
        DB::table('realms')->insert([
            ['name' => 'Gondor', 'ruler' => 'Aragorn', 'alignment' => 'Bien', 'region_id' => 4],
            ['name' => 'Rohan', 'ruler' => 'Éomer', 'alignment' => 'Bien', 'region_id' => 5],
            ['name' => 'Mordor', 'ruler' => 'Sauron', 'alignment' => 'Mal', 'region_id' => 3],
            ['name' => 'Erebor', 'ruler' => 'Thorin', 'alignment' => 'Bien', 'region_id' => 2],
        ]);
    }
}

