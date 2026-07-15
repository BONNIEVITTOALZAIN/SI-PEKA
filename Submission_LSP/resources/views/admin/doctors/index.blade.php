@extends('layouts.app')

@section('title', 'Data Dokter - SI-PEKA')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-slate-800">Data Dokter</h1>
    <a href="{{ route('admin.doctors.create') }}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-sm transition-colors">
        Tambah Dokter
    </a>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
    <table class="w-full text-left text-sm text-slate-600">
        <thead class="bg-slate-50 text-slate-700 font-medium border-b border-slate-100">
            <tr>
                <th class="px-6 py-4">No</th>
                <th class="px-6 py-4">Nama</th>
                <th class="px-6 py-4">Spesialisasi</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($doctors as $key => $doctor)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-6 py-4">{{ $doctors->firstItem() + $key }}</td>
                <td class="px-6 py-4 font-medium text-slate-900">{{ $doctor->name }}</td>
                <td class="px-6 py-4">{{ $doctor->specialization }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="text-blue-600 hover:text-blue-800 font-medium mr-3">Edit</a>
                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-8 text-center text-slate-500">Belum ada data dokter.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4 border-t border-slate-100">
        {{ $doctors->links() }}
    </div>
</div>
@endsection
