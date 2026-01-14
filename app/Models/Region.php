<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
    protected $guarded = []; // Permite escritura masiva
    
    public function realms() { return $this->hasMany(Realm::class); }
    public function creatures() { return $this->hasMany(Creature::class); }
}
