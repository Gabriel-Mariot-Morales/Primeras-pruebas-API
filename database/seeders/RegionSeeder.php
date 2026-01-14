<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder {
    public function run() {
        DB::table('regions')->insert([
            ['name' => 'Eriador'],
            ['name' => 'Rhovanion'],
            ['name' => 'Mordor'],
            ['name' => 'Gondor'],
            ['name' => 'Rohan'],
        ]);
    }
}

