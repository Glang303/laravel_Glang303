<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        return view('rumahsakit', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_rumah_sakit' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'nullable|email|max:255',
            'telepon' => 'required|string|max:20',
        ]);

        $rumahSakit = RumahSakit::create($validated);

        return response()->json($rumahSakit);
    }
    
    public function update(Request $request, $id)
    {
        $rs = RumahSakit::findOrFail($id);
        $validated = $request->validate([
            'nama_rumah_sakit' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'nullable|email',
            'telepon' => 'required|string|max:20',
        ]);
        $rs->update($validated);
        return response()->json($rs);
    }

    public function destroy($id)
    {
        RumahSakit::destroy($id);
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $data = RumahSakit::findOrFail($id);
        return response()->json($data);
    }
    
    // Revisi 1
    public function edit($id)
    {
        $rumahSakit = RumahSakit::findOrFail($id);
        return response()->json($rumahSakit);
    }
}
