@extends('layouts.app')

@section('title', 'Pendaftaran Pemeriksaan - SI-PEKA')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Pendaftaran Pemeriksaan</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola pendaftaran pemeriksaan Anda.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Daftar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Buat Pendaftaran Baru</h2>
                <form action="{{ route('pasien.pemeriksaan.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Periksa</label>
                        <input type="date" name="tanggal_periksa" value="{{ old('tanggal_periksa', date('Y-m-d')) }}"
                            required
                            class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">
                    </div>
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Keluhan</label>
                        <textarea name="keluhan" rows="4" required placeholder="Jelaskan keluhan Anda..."
                            class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">{{ old('keluhan') }}</textarea>
                    </div>
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-sm transition-colors">
                        Daftar Pemeriksaan
                    </button>
                </form>
            </div>
        </div>

        <!-- Riwayat -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-4 border-b border-slate-100 bg-slate-50">
                    <h2 class="text-lg font-bold text-slate-800">Riwayat Pendaftaran Anda</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-slate-200 text-sm font-semibold text-slate-600">
                                <th class="p-4">Tanggal Periksa</th>
                                <th class="p-4">Keluhan</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 text-center">Catatan</th>
                                <th class="p-4 text-center">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @forelse($pemeriksaans as $pemeriksaan)
                                <tr class="hover:bg-slate-50">
                                    <td class="p-4 text-slate-800 font-medium whitespace-nowrap">
                                        {{ $pemeriksaan->tanggal_periksa->format('d M Y') }}
                                    </td>
                                    <td class="p-4 text-slate-500">{{ $pemeriksaan->keluhan }}</td>
                                    <td class="p-4">
                                        @if($pemeriksaan->status == 'pending')
                                            <span
                                                class="px-2.5 py-1 text-xs font-medium bg-orange-100 text-orange-700 rounded-full">Pending</span>
                                        @elseif($pemeriksaan->status == 'diterima')
                                            <span
                                                class="px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">Diterima</span>
                                        @elseif($pemeriksaan->status == 'selesai')
                                            <span
                                                class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Selesai</span>
                                        @else
                                            <span
                                                class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="p-4 max-w-[200px]">
                                        @if($pemeriksaan->catatan)
                                            <span class="text-slate-500 text-xs">{{ $pemeriksaan->catatan }}</span>
                                        @else
                                            <span class="text-slate-400 text-xs">-</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-center">
                                        @if($pemeriksaan->status == 'diterima' && !$pemeriksaan->payment)
                                            <a href="{{ route('pasien.payments.create', $pemeriksaan->id) }}"
                                                class="inline-flex items-center px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded transition-colors">
                                                <i class="fas fa-wallet mr-1"></i> Bayar
                                            </a>
                                        @elseif($pemeriksaan->payment)
                                            @if($pemeriksaan->payment->status == 'pending')
                                                <span class="text-xs text-orange-600 font-medium"><i class="fas fa-clock mr-1"></i>
                                                    Verifikasi...</span>
                                            @elseif($pemeriksaan->payment->status == 'diterima')
                                                <span class="text-xs text-green-600 font-medium"><i
                                                        class="fas fa-check-circle mr-1"></i> Lunas</span>
                                            @else
                                                <span class="text-xs text-red-600 font-medium"
                                                    title="{{ $pemeriksaan->payment->catatan }}"><i
                                                        class="fas fa-times-circle mr-1"></i> Ditolak</span>
                                            @endif
                                        @else
                                            <span class="text-slate-400 text-xs">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-slate-500">Anda belum mendaftar pemeriksaan
                                        apapun.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection