<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Galeri::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|max:2048',
            'judul' => 'nullable|string'
        ]);

        $path = $request->file('gambar')->store('galeri', 'public');

        $galeri = Galeri::create([
            'judul' => $request->judul,
            'gambar' => $path
        ]);

        return response()->json($galeri, 201);
    }

    public function show($id)
    {
        return Galeri::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($galeri->gambar);
            $path = $request->file('gambar')->store('galeri', 'public');
            $galeri->gambar = $path;
        }

        $galeri->judul = $request->judul ?? $galeri->judul;
        $galeri->save();

        return response()->json($galeri);
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();

        return response()->json(['message' => 'Galeri dihapus']);
    }

}
