<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
        public function index()
    {
        $rumahSakits = RumahSakit::all();
        $pasiens = Pasien::with('rumahSakit')->get();
        
        return view('pasien', compact('pasiens', 'rumahSakits'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);

        $pasien = Pasien::create($validated);
        $pasien->load('rumahSakit'); 
        
        return response()->json($pasien);
    }

        public function show($id)
    {
        $pasien = Pasien::with('rumahSakit')->findOrFail($id);
        return response()->json($pasien);
    }
    

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);
        
        $pasien->update($validated);
        $pasien->load('rumahSakit'); 
        
        return response()->json($pasien);
    }

    
    public function destroy($id)
    {
        Pasien::destroy($id);
        return response()->json(['success' => true]);
    }
    
    
    public function filter(Request $request)
    {
        $query = Pasien::with('rumahSakit');
        if ($request->has('rumah_sakit_id') && $request->rumah_sakit_id != '') {
            $query->where('rumah_sakit_id', $request->rumah_sakit_id);
        }
        $pasiens = $query->get();
        return response()->json($pasiens);
    }
}
