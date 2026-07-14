@extends('layouts.app')

@section('title', 'Pengumuman - SI-PEKA')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Kelola Pengumuman</h1>
        <p class="text-sm text-slate-500 mt-1">Daftar pengumuman yang ditampilkan ke pasien.</p>
    </div>
    <a href="{{ route('admin.announcements.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors flex items-center">
        <i class="fas fa-plus mr-2"></i> Tambah Pengumuman
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($announcements as $announcement)
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden flex flex-col">
        @if($announcement->image_path)
            <img src="{{ Storage::url($announcement->image_path) }}" alt="{{ $announcement->title }}" class="h-48 w-full object-cover">
        @else
            <div class="h-48 w-full bg-slate-100 flex items-center justify-center">
                <i class="fas fa-image text-4xl text-slate-300"></i>
            </div>
        @endif
        <div class="p-5 flex-1 flex flex-col">
            <h3 class="text-lg font-bold text-slate-800 mb-2">{{ $announcement->title }}</h3>
            <p class="text-sm text-slate-600 line-clamp-3 mb-4 flex-1">{{ $announcement->content }}</p>
            <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-100">
                <span class="text-xs text-slate-500">{{ $announcement->created_at->diffForHumans() }}</span>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded transition-colors" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded transition-colors" title="Hapus" onclick="return confirm('Hapus pengumuman ini?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full p-8 text-center bg-white rounded-xl shadow-sm border border-slate-100">
        <p class="text-slate-500">Belum ada pengumuman.</p>
    </div>
    @endforelse
</div>
@endsection
