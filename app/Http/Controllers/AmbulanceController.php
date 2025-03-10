<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    public function index()
    {
        return Ambulance::all();
    }

    public function store(Request $request)
    {
        $ambulance = Ambulance::create($request->all());
        return response()->json($ambulance, 201);
    }

    public function show($id)
    {
        return Ambulance::find($id);
    }

    public function update(Request $request, $id)
    {
        $ambulance = Ambulance::find($id);
        $ambulance->update($request->all());
        return response()->json($ambulance, 200);
    }

    public function destroy($id)
    {
        Ambulance::destroy($id);
        return response()->json(null, 204);
    }
}
