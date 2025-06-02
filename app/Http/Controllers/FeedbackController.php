<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:100',
            'pesan' => 'required|string|max:1000',
        ]);

        $feedback = Feedback::create($request->only('nama', 'pesan'));

        return response()->json([
            'message' => 'Feedback berhasil dikirim!',
            'data' => $feedback
        ], 201);
    }

    public function index()
    {
        $feedback = Feedback::latest()->get();

        return response()->json([
            'data' => $feedback
        ]);
    }
}

