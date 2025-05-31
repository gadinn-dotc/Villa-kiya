<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Villa;

class VillaController extends Controller
{
    public function updateStatus(Request $request, $id)
{
    $villa = Villa::findOrFail($id);

    $request->validate([
        'status' => 'required|in:tersedia,tidak_tersedia',
        'jumlah_kamar' => 'nullable|integer|min:0',
    ]);

    $villa->status = $request->status;

    if ($villa->tipe === 'per_kamar') {
        if ($request->status === 'tersedia') {
            $villa->jumlah_kamar = $request->jumlah_kamar ?? $villa->jumlah_kamar;
        } else {
            $villa->jumlah_kamar = 0;
        }
    }

    $villa->save();

    return response()->json([
        'message' => 'Status villa berhasil diperbarui',
        'data' => $villa,
    ]);
}
}
