<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model {
    protected $guarded = []; // Si da error, cambia 'Hero' por el nombre de tu archivo
    
    public function realm() { return $this->belongsTo(Realm::class); }
    public function artifacts() { return $this->belongsToMany(Artifact::class, 'artifact_hero'); }
}
