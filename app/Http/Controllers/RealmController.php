<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realm;

class RealmController extends Controller
{
    public function index() { return Realm::all(); }
    public function show($id) { 
        return Realm::with(['region', 'heroes', 'artifacts'])->findOrFail($id); 
    }
    public function store(Request $request) { return Realm::create($request->all()); }
    public function update(Request $request, $id) {
        $realm = Realm::findOrFail($id);
        $realm->update($request->all());
        return $realm;
    }
    public function destroy($id) { return Realm::destroy($id); }
    // GET /realms/{id}/heroes
    public function getHeroesByRealm($id) {
        return Realm::findOrFail($id)->heroes;
    }
}
