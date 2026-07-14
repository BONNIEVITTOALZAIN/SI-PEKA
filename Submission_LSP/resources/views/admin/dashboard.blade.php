@extends('layouts.app')

@section('title', 'Admin Dashboard - SI-PEKA')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Dashboard Admin</h1>
        <p class="text-sm text-slate-500 mt-1">Ringkasan aktivitas klinik SI-PEKA.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
    <!-- Card 1 -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex items-center">
        <div class="p-3 rounded-full bg-blue-50 text-blue-600 mr-4">
            <i class="fas fa-user-clock fa-fw text-xl"></i>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Akun Menunggu</p>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['users_pending'] }}</p>
        </div>
    </div>
    
    <!-- Card 2 -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex items-center">
        <div class="p-3 rounded-full bg-orange-50 text-orange-600 mr-4">
            <i class="fas fa-stethoscope fa-fw text-xl"></i>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Periksa Pending</p>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['pemeriksaan_pending'] }}</p>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex items-center">
        <div class="p-3 rounded-full bg-green-50 text-green-600 mr-4">
            <i class="fas fa-money-bill-wave fa-fw text-xl"></i>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Bayar Pending</p>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['payment_pending'] }}</p>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex items-center">
        <div class="p-3 rounded-full bg-purple-50 text-purple-600 mr-4">
            <i class="fas fa-bullhorn fa-fw text-xl"></i>
        </div>
        <div>
            <p class="text-sm font-medium text-slate-500">Total Pengumuman</p>
            <p class="text-2xl font-bold text-slate-800">{{ $stats['announcements'] }}</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6">
    <h2 class="text-lg font-bold text-slate-800 mb-4">Akses Cepat</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.accounts.index') }}" class="flex flex-col items-center justify-center p-4 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
            <i class="fas fa-users text-2xl text-blue-500 mb-2"></i>
            <span class="text-sm font-medium text-slate-700">Kelola Akun</span>
        </a>
        <a href="{{ route('admin.pemeriksaan.index') }}" class="flex flex-col items-center justify-center p-4 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
            <i class="fas fa-calendar-check text-2xl text-orange-500 mb-2"></i>
            <span class="text-sm font-medium text-slate-700">Verifikasi Periksa</span>
        </a>
        <a href="{{ route('admin.payments.index') }}" class="flex flex-col items-center justify-center p-4 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
            <i class="fas fa-receipt text-2xl text-green-500 mb-2"></i>
            <span class="text-sm font-medium text-slate-700">Verifikasi Bayar</span>
        </a>
        <a href="{{ route('admin.announcements.create') }}" class="flex flex-col items-center justify-center p-4 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
            <i class="fas fa-plus-circle text-2xl text-purple-500 mb-2"></i>
            <span class="text-sm font-medium text-slate-700">Buat Pengumuman</span>
        </a>
    </div>
</div>
@endsection
