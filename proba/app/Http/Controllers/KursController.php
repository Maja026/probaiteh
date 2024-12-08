<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use Illuminate\Http\Request;

class KursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kursevi = Kurs::all();
        return response()->json($kursevi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
            // Add other validations as needed
        ]);
    
        $kurs = Kurs::create($request->all());
        return response()->json($kurs, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kurs = Kurs::find($id);
        if ($kurs) {
            return response()->json($kurs);
        }
        return response()->json(['message' => 'Kurs not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kurs = Kurs::find($id);
        if ($kurs) {
            $kurs->update($request->all());
            return response()->json($kurs);
        }
        return response()->json(['message' => 'Kurs not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kurs = Kurs::find($id);
        if ($kurs) {
            $kurs->delete();
            return response()->json(['message' => 'Kurs deleted']);
        }
        return response()->json(['message' => 'Kurs not found'], 404);
    }
}
