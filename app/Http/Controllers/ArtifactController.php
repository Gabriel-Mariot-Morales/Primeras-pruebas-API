<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artifact;
class ArtifactController extends Controller
{
    public function index() { return Artifact::all(); }
    public function show($id) { 
        return Artifact::with(['realm', 'heroes'])->findOrFail($id); 
    }
    public function store(Request $request) { 
        // 1. Extraemos los datos PERO quitamos el hero_id porque no es una columna de esta tabla
        $datosArtefacto = $request->except('hero_id');
        
        // 2. Creamos el artefacto limpio
        $artifact = Artifact::create($datosArtefacto);
        
        // 3. Si mandamos un 'hero_id', lo vinculamos en la tabla pivote
        if ($request->has('hero_id')) {
            $artifact->heroes()->attach($request->hero_id);
        }
        
        return $artifact;
    }
    public function update(Request $request, $id) {
        $a = Artifact::findOrFail($id);
        $a->update($request->all());
        return $a;
    }
    public function destroy($id) {
        // 1. Buscamos el artefacto
        $artifact = Artifact::findOrFail($id);
        
        // 2. Borramos las relaciones en la tabla pivote (artifact_hero)
        // Esto borra los vínculos sin borrar a los héroes
        $artifact->heroes()->detach(); 
        
        // 3. Ahora sí, borramos el artefacto
        $artifact->delete();
        
        return response()->json(null, 204); // Devuelve "Sin contenido" (éxito)
    }
    // GET /artifacts/{id}/heroes
    public function getHeroes($id) {
        return Artifact::findOrFail($id)->heroes;
    }

    // GET /artifacts/top
    public function getTop() {
        return Artifact::where('power_level', '>', 90)->get();
    }
}
