@extends('layouts.app')

@section('title', 'Verifikasi Pembayaran - SI-PEKA')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Verifikasi Pembayaran</h1>
        <p class="text-sm text-slate-500 mt-1">Daftar konfirmasi pembayaran dari pasien.</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Pasien</th>
                    <th class="p-4">Metode / Nominal</th>
                    <th class="p-4 text-center">Bukti Bayar</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($payments as $payment)
                <tr class="hover:bg-slate-50">
                    <td class="p-4 text-slate-500">{{ $payment->created_at->format('d M Y, H:i') }}</td>
                    <td class="p-4 font-medium text-slate-800">{{ $payment->pemeriksaan->user->name }}</td>
                    <td class="p-4 text-slate-800">
                        <div class="font-medium">Rp {{ number_format($payment->nominal, 0, ',', '.') }}</div>
                        <div class="text-xs text-slate-500 uppercase">{{ $payment->metode }}</div>
                    </td>
                    <td class="p-4 text-center">
                        @if($payment->bukti_bayar)
                            <a href="{{ Storage::url($payment->bukti_bayar) }}" target="_blank" class="text-blue-600 hover:underline inline-flex items-center">
                                <i class="fas fa-image mr-1"></i> Lihat
                            </a>
                        @else
                            <span class="text-slate-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($payment->status == 'pending')
                            <span class="px-2.5 py-1 text-xs font-medium bg-orange-100 text-orange-700 rounded-full">Pending</span>
                        @elseif($payment->status == 'diterima')
                            <span class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Diterima</span>
                        @else
                            <span class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Ditolak</span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($payment->status == 'pending')
                        <div class="flex flex-col space-y-2 min-w-[200px]">
                            <form action="{{ route('admin.payments.verify', $payment->id) }}" method="POST" class="flex flex-col space-y-2">
                                @csrf
                                <input type="text" name="catatan" placeholder="Catatan (Opsional)" class="text-xs rounded-md border border-slate-300 px-2 py-1.5 w-full focus:ring-blue-500 focus:border-blue-500">
                                <div class="flex space-x-2">
                                    <button type="submit" name="status" value="diterima" class="flex-1 px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded shadow-sm transition-colors" onclick="return confirm('Terima pembayaran ini?')">
                                        Terima
                                    </button>
                                    <button type="submit" name="status" value="ditolak" class="flex-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded shadow-sm transition-colors" onclick="return confirm('Tolak pembayaran ini?')">
                                        Tolak
                                    </button>
                                </div>
                            </form>
                        </div>
                        @else
                            <span class="text-slate-400 text-xs italic">Verified at {{ $payment->verified_at->format('d/m/Y') }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-slate-500">Belum ada data pembayaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
