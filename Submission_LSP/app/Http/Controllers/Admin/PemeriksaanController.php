<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $pemeriksaans = Pemeriksaan::with('user.patientProfile')->latest()->get();
        return view('admin.pemeriksaan.index', compact('pemeriksaans'));
    }

    public function verify(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak,selesai',
            'catatan' => 'nullable|string'
        ]);

        $pemeriksaan = Pemeriksaan::findOrFail($id);
        $pemeriksaan->update([
            'status' => $request->status,
            'catatan' => $request->catatan,
            'verified_by' => auth()->id(),
            'verified_at' => now(),
        ]);

        return back()->with('success', 'Status pemeriksaan berhasil diperbarui.');
    }
}
