@extends('layouts.app')

@section('title', 'Verifikasi Pemeriksaan - SI-PEKA')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Verifikasi Pemeriksaan</h1>
        <p class="text-sm text-slate-500 mt-1">Daftar pendaftaran pemeriksaan pasien.</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-sm font-semibold text-slate-600">
                    <th class="p-4">Tgl Periksa</th>
                    <th class="p-4">Pasien</th>
                    <th class="p-4">Keluhan</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm">
                @forelse($pemeriksaans as $pemeriksaan)
                <tr class="hover:bg-slate-50">
                    <td class="p-4 text-slate-800 font-medium whitespace-nowrap">
                        {{ $pemeriksaan->tanggal_periksa->format('d M Y') }}
                    </td>
                    <td class="p-4 text-slate-800">{{ $pemeriksaan->user->name }}</td>
                    <td class="p-4 text-slate-500 max-w-xs truncate" title="{{ $pemeriksaan->keluhan }}">{{ $pemeriksaan->keluhan }}</td>
                    <td class="p-4">
                        @if($pemeriksaan->status == 'pending')
                            <span class="px-2.5 py-1 text-xs font-medium bg-orange-100 text-orange-700 rounded-full">Pending</span>
                        @elseif($pemeriksaan->status == 'diterima')
                            <span class="px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-700 rounded-full">Diterima</span>
                        @elseif($pemeriksaan->status == 'selesai')
                            <span class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-700 rounded-full">Selesai</span>
                        @else
                            <span class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-700 rounded-full">Ditolak</span>
                        @endif
                    </td>
                    <td class="p-4 flex justify-center space-x-2">
                        @if($pemeriksaan->status == 'pending')
                            <form action="{{ route('admin.pemeriksaan.verify', $pemeriksaan->id) }}" method="POST" class="flex flex-col space-y-2 w-full min-w-[150px]">
                                @csrf
                                <input type="text" name="catatan" placeholder="Catatan" class="text-xs rounded-md border border-slate-300 px-2 py-1 w-full focus:ring-blue-500 focus:border-blue-500">
                                <div class="flex justify-center space-x-2">
                                    <button type="submit" name="status" value="diterima" class="flex-1 p-1.5 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded transition-colors" title="Terima">
                                        <i class="fas fa-check text-xs"></i> Terima
                                    </button>
                                    <button type="submit" name="status" value="ditolak" class="flex-1 p-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded transition-colors" title="Tolak">
                                        <i class="fas fa-times text-xs"></i> Tolak
                                    </button>
                                </div>
                            </form>
                        @elseif($pemeriksaan->status == 'diterima')
                            <form action="{{ route('admin.pemeriksaan.verify', $pemeriksaan->id) }}" method="POST" class="flex flex-col space-y-2 w-full min-w-[150px]">
                                @csrf
                                <input type="text" name="catatan" placeholder="Catatan (Opsional)" class="text-xs rounded-md border border-slate-300 px-2 py-1 w-full focus:ring-blue-500 focus:border-blue-500">
                                <button type="submit" name="status" value="selesai" class="w-full p-1.5 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded transition-colors" title="Tandai Selesai" onclick="return confirm('Tandai pemeriksaan ini sudah selesai?')">
                                    <i class="fas fa-check-double text-xs"></i> Selesai
                                </button>
                            </form>
                        @else
                            <span class="text-slate-400">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-slate-500">Belum ada data pemeriksaan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
