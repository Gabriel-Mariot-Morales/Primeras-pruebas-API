<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realm extends Model {
    protected $guarded = [];
    
    public function region() { return $this->belongsTo(Region::class); }
    public function heroes() { return $this->hasMany(Hero::class); }
    public function artifacts() { return $this->hasMany(Artifact::class, 'origin_realm_id'); }
}
