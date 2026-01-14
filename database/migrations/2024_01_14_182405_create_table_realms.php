<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('realms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ruler');
            $table->string('alignment');
            $table->foreignId('region_id')->constrained('regions');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('realms');
    }
};

