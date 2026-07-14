@extends('layouts.app')

@section('title', 'Edit Pengumuman - SI-PEKA')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Edit Pengumuman</h1>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 max-w-2xl">
    <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Judul Pengumuman</label>
            <input type="text" name="title" value="{{ old('title', $announcement->title) }}" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-slate-700 mb-1">Isi Pengumuman</label>
            <textarea name="content" rows="5" required class="w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 border">{{ old('content', $announcement->content) }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-slate-700 mb-1">Gambar Baru (Opsional)</label>
            @if($announcement->image_path)
                <div class="mb-2">
                    <img src="{{ Storage::url($announcement->image_path) }}" alt="Gambar" class="h-32 object-cover rounded">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" class="w-full rounded-lg border-slate-300 shadow-sm px-4 py-2 border">
            <p class="text-xs text-slate-500 mt-1">Abaikan jika tidak ingin mengubah gambar.</p>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.announcements.index') }}" class="px-4 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-sm transition-colors">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
