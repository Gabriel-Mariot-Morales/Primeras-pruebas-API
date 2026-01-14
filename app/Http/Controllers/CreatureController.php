<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creature;
class CreatureController extends Controller
{
    public function index() { return Creature::all(); }
    public function show($id) { return Creature::with('region')->findOrFail($id); }
    public function store(Request $request) { return Creature::create($request->all()); }
    public function update(Request $request, $id) {
        $c = Creature::findOrFail($id);
        $c->update($request->all());
        return $c;
    }
    public function destroy($id) { return Creature::destroy($id); }
    // GET /creatures/dangerous?level=8
    public function getDangerous(Request $request) {
        // Lee el parámetro ?level=X, si no viene usa 8 por defecto
        $level = $request->query('level', 8); 
        return Creature::where('threat_level', '>=', $level)->get();
    }
}
