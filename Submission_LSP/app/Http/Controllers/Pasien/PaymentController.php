<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($id)
    {
        $pemeriksaan = Pemeriksaan::where('user_id', auth()->id())
            ->where('id', $id)
            ->where('status', 'diterima') // Asumsikan pembayaran hanya bisa dilakukan setelah diterima
            ->firstOrFail();

        if ($pemeriksaan->payment) {
            return redirect()->route('pasien.pemeriksaan.index')->with('error', 'Pembayaran sudah dilakukan.');
        }

        return view('pasien.payments.create', compact('pemeriksaan'));
    }

    public function store(Request $request, $id)
    {
        $pemeriksaan = Pemeriksaan::where('user_id', auth()->id())
            ->where('id', $id)
            ->where('status', 'diterima')
            ->firstOrFail();

        if ($pemeriksaan->payment) {
            return redirect()->route('pasien.pemeriksaan.index')->with('error', 'Pembayaran sudah dilakukan.');
        }

        $request->validate([
            'nominal' => 'required|numeric|min:0',
            'metode' => 'required|string',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $payment = new Payment([
            'pemeriksaan_id' => $pemeriksaan->id,
            'nominal' => $request->nominal,
            'metode' => $request->metode,
            'status' => 'pending'
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $payment->bukti_bayar = $request->file('bukti_bayar')->store('payments', 'public');
        }

        $payment->save();

        return redirect()->route('pasien.pemeriksaan.index')->with('success', 'Konfirmasi pembayaran berhasil dikirim.');
    }
}
