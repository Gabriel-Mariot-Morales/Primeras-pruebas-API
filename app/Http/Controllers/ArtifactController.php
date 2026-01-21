<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artifact;

class ArtifactController extends Controller
{
    public function index() { 
        return Artifact::all(); 
    }

    public function show($id) { 
        return Artifact::with(['origin_realm', 'heroes'])->findOrFail($id); 
    }

    public function store(Request $request) { 
        // 1. Quitamos 'hero_ids' del array de datos para que no falle al intentar guardar en la tabla 'artifacts'
        $datosArtefacto = $request->except('hero_ids');
        
        // 2. Creamos el artefacto
        $artifact = Artifact::create($datosArtefacto);
        
        // 3. Verificamos si existe el array 'hero_ids' y lo vinculamos
        if ($request->has('hero_ids')) {
            $artifact->heroes()->attach($request->hero_ids);
        }
        
        return $artifact->load('heroes');
    }

    public function update(Request $request, $id) {
        $artifact = Artifact::findOrFail($id);

        // 1. Quitamos 'hero_ids' para la actualización de la tabla principal
        $datosArtefacto = $request->except('hero_ids');
        
        // 2. Actualizamos el artefacto
        $artifact->update($datosArtefacto);
        
        // 3. Sincronizamos usando la clave 'hero_ids'
        if ($request->has('hero_ids')) {
            $artifact->heroes()->sync($request->hero_ids);
        }

        return $artifact->load('heroes');
    }

    public function destroy($id) {
        $artifact = Artifact::findOrFail($id);
        
        $artifact->heroes()->detach(); 
        
        $artifact->delete();
        
        return response()->json(null, 204);
    }

    public function getHeroes($id) {
        return Artifact::findOrFail($id)->heroes;
    }

    public function getTop() {
        return Artifact::where('power_level', '>', 90)->get();
    }
}