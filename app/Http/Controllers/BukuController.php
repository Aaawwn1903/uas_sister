<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // Menampilkan semua buku
    public function index()
    {
        $buku = Buku::all();
        return response()->json($buku);
    }

    // Menampilkan detail buku berdasarkan ID
    public function show($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }
        return response()->json($buku);
    }

    // Menambahkan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'sinopsis' => 'required',
        ]);

        $buku = Buku::create($request->all());
        return response()->json($buku, 201);
    }

    // Mengupdate informasi buku berdasarkan ID
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'sinopsis' => 'required',
        ]);

        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }

        $buku->update($request->all());
        return response()->json($buku);
    }

    // Menghapus buku berdasarkan ID
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku not found'], 404);
        }

        $buku->delete();
        return response()->json(['message' => 'Buku deleted']);
    }
}
