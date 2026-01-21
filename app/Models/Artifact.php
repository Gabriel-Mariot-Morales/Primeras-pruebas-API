<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artifact extends Model {
    protected $guarded = [];
    public function origin_realm() {
        return $this->belongsTo(Realm::class, 'origin_realm_id');
    }
    public function realm() { return $this->belongsTo(Realm::class, 'origin_realm_id'); }
    public function heroes() { return $this->belongsToMany(Hero::class, 'artifact_hero'); }
}
