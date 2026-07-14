@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran - SI-PEKA')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Konfirmasi Pembayaran</h1>
    <p class="text-sm text-slate-500 mt-1">Upload bukti pembayaran untuk pemeriksaan Anda.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 max-w-2xl">
    <div class="mb-6 p-4 bg-blue-50 border border-blue-100 rounded-lg flex items-start">
        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
        <div>
            <h3 class="text-sm font-bold text-blue-800 mb-1">Informasi Pemeriksaan</h3>
            <p class="text-sm text-blue-700">Tanggal: <span class="font-semibold">{{ $pemeriksaan->tanggal_periksa->format('d M Y') }}</span></p>
            <p class="text-sm text-blue-700">Keluhan: {{ $pemeriksaan->keluhan }}</p>
        </div>
    </div>

    <form action="{{ route('pasien.payments.store', $pemeriksaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Metode Pembayaran</label>
            <select name="metode" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">
                <option value="">-- Pilih Metode --</option>
                <option value="Transfer Bank BCA (1234567890 a.n Klinik)">Transfer Bank BCA (1234567890)</option>
                <option value="Transfer Bank Mandiri (0987654321 a.n Klinik)">Transfer Bank Mandiri (0987654321)</option>
                <option value="GOPAY / OVO / DANA (081234567890)">GOPAY / OVO / DANA (081234567890)</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Nominal (Rp)</label>
            <input type="number" name="nominal" value="{{ old('nominal') }}" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">
            <p class="text-xs text-slate-500 mt-1">Masukkan nominal sesuai tagihan atau instruksi klinik.</p>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Upload Bukti Bayar</label>
            <input type="file" name="bukti_bayar" accept="image/*" required class="w-full rounded-lg border-slate-300 shadow-sm px-4 py-2 border">
            <p class="text-xs text-slate-500 mt-1">Format: JPG, PNG (Max 2MB)</p>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('pasien.pemeriksaan.index') }}" class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-sm transition-colors">Konfirmasi Pembayaran</button>
        </div>
    </form>
</div>
@endsection
