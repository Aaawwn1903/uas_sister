<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    // Menampilkan semua anggota
    public function index()
    {
        $anggota = Anggota::all();
        return response()->json($anggota);
    }

    // Menampilkan detail anggota berdasarkan ID
    public function show($id)
    {
        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }
        return response()->json($anggota);
    }

    // Menambahkan anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:anggota',
            'password' => 'required',
        ]);

        $anggota = Anggota::create($request->all());
        return response()->json($anggota, 201);
    }

    // Mengupdate informasi anggota berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:anggota,email,' . $id,
            'password' => 'required',
        ]);

        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }

        $anggota->update($request->all());
        return response()->json($anggota);
    }

    // Menghapus anggota berdasarkan ID
    public function destroy($id)
    {
        $anggota = Anggota::find($id);
        if (!$anggota) {
            return response()->json(['message' => 'Anggota not found'], 404);
        }

        $anggota->delete();
        return response()->json(['message' => 'Anggota deleted']);
    }
}
