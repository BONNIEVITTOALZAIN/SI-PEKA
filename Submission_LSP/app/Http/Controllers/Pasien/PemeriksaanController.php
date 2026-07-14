<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $pemeriksaans = Pemeriksaan::where('user_id', Auth::id())->with('payment')->latest()->get();
        return view('pasien.pemeriksaan.index', compact('pemeriksaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_periksa' => 'required|date|after_or_equal:today',
            'keluhan' => 'required|string',
        ]);

        Pemeriksaan::create([
            'user_id' => Auth::id(),
            'tanggal_periksa' => $request->tanggal_periksa,
            'keluhan' => $request->keluhan,
            'status' => 'pending'
        ]);

        return redirect()->route('pasien.pemeriksaan.index')->with('success', 'Pendaftaran pemeriksaan berhasil dikirim.');
    }
}
