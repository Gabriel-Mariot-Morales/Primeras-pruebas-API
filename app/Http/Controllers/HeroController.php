<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    public function index() { return Hero::all(); }
    public function show($id) { 
        return Hero::with(['realm', 'artifacts'])->findOrFail($id); 
    }
    public function store(Request $request) { return Hero::create($request->all()); }
    public function update(Request $request, $id) {
        $hero = Hero::findOrFail($id);
        $hero->update($request->all());
        return $hero;
    }
    public function destroy($id) { return Hero::destroy($id); }
    // POST /artifact-hero (Asignar)
    public function attachArtifact(Request $request) {
        $request->validate(['hero_id' => 'required', 'artifact_id' => 'required']);
        
        $hero = Hero::findOrFail($request->hero_id);
        // syncWithoutDetaching evita duplicados si ya lo tiene
        $hero->artifacts()->syncWithoutDetaching([$request->artifact_id]); 
        
        return response()->json(['message' => 'Artefacto asignado correctamente']);
    }

    // DELETE /artifact-hero (Desvincular)
    public function detachArtifact(Request $request) {
        $request->validate(['hero_id' => 'required', 'artifact_id' => 'required']);
        
        $hero = Hero::findOrFail($request->hero_id);
        $hero->artifacts()->detach($request->artifact_id);
        
        return response()->json(['message' => 'Artefacto retirado correctamente']);
    }

    // GET /heroes/{id}/artifacts
    public function getArtifacts($id) {
        return Hero::findOrFail($id)->artifacts;
    }

    // GET /heroes/alive
    public function getAlive() {
        return Hero::where('alive', true)->get();
    }
}
