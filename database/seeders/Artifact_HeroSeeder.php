<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Artifact_HeroSeeder extends Seeder {
    public function run() {
        DB::table('artifact_hero')->insert([
            ['artifact_id' => 1, 'hero_id' => 4], // Frodo lleva el Anillo Único
            ['artifact_id' => 2, 'hero_id' => 1], // Aragorn lleva la espada Andúril
            ['artifact_id' => 3, 'hero_id' => 2], // Legolas lleva el "Arco de Legolas" (claro)
        ]);
    }
}

