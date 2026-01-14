<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('race');
            $table->string('rank')->nullable();
            $table->foreignId('realm_id')->constrained('realms');
            $table->boolean('alive')->default(true);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('heroes');
    }
};
