@extends('layouts.app')

@section('title', 'Dashboard Pasien - SI-PEKA')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Selamat datang, {{ Auth::user()->name }}!</h1>
        <p class="text-sm text-slate-500 mt-1">Dashboard pendaftaran pemeriksaan klinik.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Bagian Kiri: Pengumuman -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Pengumuman Terbaru</h2>
                <div class="space-y-4">
                    @forelse($announcements as $announcement)
                        <div class="flex space-x-4">
                            @if ($announcement->image)
                                <div class="flex-shrink-0">
                                    <img src="{{ Storage::url($announcement->image) }}" alt="Gambar"
                                        class="h-20 w-20 object-cover rounded-lg border border-slate-200">
                                </div>
                            @endif
                            <div>
                                <h3 class="text-md font-semibold text-blue-600">{{ $announcement->judul }}</h3>
                                <span
                                    class="text-xs text-slate-400 block mb-1">{{ $announcement->created_at->format('d M Y') }}</span>
                                <p class="text-sm text-slate-600">{{ $announcement->isi }}</p>
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr class="border-slate-100">
                        @endif
                    @empty
                        <p class="text-sm text-slate-500 text-center py-4">Belum ada pengumuman.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Bagian Kanan: Aksi dan Status -->
        <div class="space-y-6">
            <div
                class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl shadow-md p-6 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-xl font-bold mb-2">Daftar Pemeriksaan</h2>
                    <p class="text-blue-100 text-sm mb-4">Lakukan pendaftaran pemeriksaan secara mandiri.</p>
                    <a href="{{ route('pasien.pemeriksaan.index') }}"
                        class="inline-block bg-white text-blue-700 font-medium px-4 py-2 rounded-lg shadow hover:bg-blue-50 transition-colors">
                        Daftar Sekarang
                    </a>
                </div>
                <i class="fas fa-notes-medical absolute -right-6 -bottom-6 text-7xl text-white opacity-20"></i>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-2">Pemeriksaan Terakhir</h2>
                <ul class="space-y-3">
                    @forelse($recentPemeriksaans as $p)
                        <li class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-slate-800">{{ $p->tanggal_periksa->format('d M Y') }}</p>
                                <p class="text-xs text-slate-500 truncate w-32" title="{{ $p->keluhan }}">
                                    {{ $p->keluhan }}</p>
                            </div>
                            <div>
                                @if ($p->status == 'pending')
                                    <span
                                        class="px-2 py-1 text-[10px] font-medium bg-orange-100 text-orange-700 rounded-full">Pending</span>
                                @elseif($p->status == 'diterima')
                                    <span
                                        class="px-2 py-1 text-[10px] font-medium bg-blue-100 text-blue-700 rounded-full">Diterima</span>
                                @elseif($p->status == 'selesai')
                                    <span
                                        class="px-2 py-1 text-[10px] font-medium bg-green-100 text-green-700 rounded-full">Selesai</span>
                                @else
                                    <span
                                        class="px-2 py-1 text-[10px] font-medium bg-red-100 text-red-700 rounded-full">Ditolak</span>
                                @endif
                            </div>
                        </li>
                    @empty
                        <p class="text-sm text-slate-500 text-center py-2">Belum ada riwayat pemeriksaan.</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
