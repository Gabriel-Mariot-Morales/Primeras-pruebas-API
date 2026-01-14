<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('creatures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->unsignedTinyInteger('threat_level');
            $table->foreignId('region_id')->constrained('regions');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('creatures');
    }
};

