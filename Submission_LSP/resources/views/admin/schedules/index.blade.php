@extends('layouts.app')

@section('title', 'Jadwal Dokter - SI-PEKA')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-slate-800">Jadwal Dokter</h1>
    <a href="{{ route('admin.schedules.create') }}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 shadow-sm transition-colors">
        Tambah Jadwal
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
                <th class="px-6 py-4">Dokter</th>
                <th class="px-6 py-4">Hari</th>
                <th class="px-6 py-4">Jam Mulai</th>
                <th class="px-6 py-4">Jam Selesai</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($schedules as $key => $schedule)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-6 py-4">{{ $schedules->firstItem() + $key }}</td>
                <td class="px-6 py-4 font-medium text-slate-900">
                    {{ $schedule->doctor->name ?? '-' }} <br>
                    <span class="text-xs text-slate-500">{{ $schedule->doctor->specialization ?? '' }}</span>
                </td>
                <td class="px-6 py-4">{{ $schedule->day }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}</td>
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="text-blue-600 hover:text-blue-800 font-medium mr-3">Edit</a>
                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-slate-500">Belum ada data jadwal.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4 border-t border-slate-100">
        {{ $schedules->links() }}
    </div>
</div>
@endsection
