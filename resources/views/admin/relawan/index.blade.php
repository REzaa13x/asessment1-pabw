@extends('admin.layouts.master')

@section('content')
<div class="card p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kampanye Relawan</h1>
        <a href="{{ route('admin.relawan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Buat Kampanye Relawan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Selesai</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($campaigns as $campaign)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ $campaign->id }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                            <div class="font-medium text-gray-900">{{ $campaign->judul }}</div>
                            <div class="text-gray-500 text-xs">{{ $campaign->lokasi }}</div>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ $campaign->lokasi }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ \Carbon\Carbon::parse($campaign->tanggal_mulai)->format('d M Y') }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ \Carbon\Carbon::parse($campaign->tanggal_selesai)->format('d M Y') }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                            <span class="px-2 py-1 rounded-full text-xs
                                @if($campaign->status == 'Aktif') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ $campaign->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.relawan.show', ['id' => $campaign->id]) }}" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('admin.relawan.edit', ['id' => $campaign->id]) }}" class="text-yellow-600 hover:text-yellow-900">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.relawan.delete', ['id' => $campaign->id]) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kampanye ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 border-b border-gray-200 text-sm text-center text-gray-500">
                            Tidak ada data kampanye relawan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection