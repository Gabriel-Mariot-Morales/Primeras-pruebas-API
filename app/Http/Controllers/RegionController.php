<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
class RegionController extends Controller
{
    public function index() { return Region::all(); }
    public function show($id) { return Region::findOrFail($id); }
    public function store(Request $request) { return Region::create($request->all()); }
    public function update(Request $request, $id) {
        $region = Region::findOrFail($id);
        $region->update($request->all());
        return $region;
    }
    public function destroy($id) { return Region::destroy($id); }
    // GET /regions/{id}/creatures
    public function getCreaturesByRegion($id) {
        return Region::findOrFail($id)->creatures;
    }
}
