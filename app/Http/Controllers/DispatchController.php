<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function index()
    {
        return Dispatch::with(['ambulance', 'patient'])->get();
    }

    public function store(Request $request)
    {
        $dispatch = Dispatch::create($request->all());
        return response()->json($dispatch, 201);
    }

    public function show($id)
    {
        return Dispatch::with(['ambulance', 'patient'])->find($id);
    }

    public function update(Request $request, $id)
    {
        $dispatch = Dispatch::find($id);
        $dispatch->update($request->all());
        return response()->json($dispatch, 200);
    }

    public function destroy($id)
    {
        Dispatch::destroy($id);
        return response()->json(null, 204);
    }
}
