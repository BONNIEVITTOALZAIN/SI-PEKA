@extends('layouts.app')

@section('title', 'Tambah Pengumuman - SI-PEKA')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Tambah Pengumuman</h1>
    <p class="text-sm text-slate-500 mt-1">Buat pengumuman baru untuk pasien.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 max-w-2xl">
    <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Judul Pengumuman</label>
            <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Isi Pengumuman</label>
            <textarea name="content" rows="5" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">{{ old('content') }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Gambar (Opsional)</label>
            <input type="file" name="image" accept="image/*" class="w-full rounded-lg border-slate-300 shadow-sm px-4 py-2 border">
            <p class="text-xs text-slate-500 mt-1">Format: JPG, PNG (Max 2MB)</p>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.announcements.index') }}" class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-sm transition-colors">Simpan</button>
        </div>
    </form>
</div>
@endsection
