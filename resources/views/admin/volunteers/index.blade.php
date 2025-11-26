@extends('admin.layouts.master')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Verifikasi Pendaftaran Relawan</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif


        <!-- Volunteers Grouped by Campaign -->
        @if(isset($volunteersByCampaign) && !empty($volunteersByCampaign))
            <h2 class="text-xl font-bold text-gray-800 mb-6">Pendaftar Berdasarkan Kampanye</h2>

            @foreach($campaigns as $campaign)
                @if(isset($volunteersByCampaign[$campaign->id]) && $volunteersByCampaign[$campaign->id]->count() > 0)
                <div class="card p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-people-group mr-2 text-blue-500"></i>
                            {{ $campaign->judul }}
                            <span class="text-sm text-gray-500 ml-2">({{ $volunteersByCampaign[$campaign->id]->count() }} pendaftar)</span>
                        </h3>
                        <span class="px-3 py-1 rounded-full text-sm
                            @if($campaign->status == 'Aktif') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800
                            @endif">
                            {{ $campaign->status }}
                        </span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($volunteersByCampaign[$campaign->id]->take(5) as $volunteer) <!-- Take only first 5 -->
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ substr($volunteer->nama_lengkap, 0, 20) }}{{ strlen($volunteer->nama_lengkap) > 20 ? '...' : '' }}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ substr($volunteer->email, 0, 25) }}{{ strlen($volunteer->email) > 25 ? '...' : '' }}</td>
                                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                                            <span class="px-2 py-1 rounded-full text-xs
                                                @if($volunteer->status_verifikasi == 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($volunteer->status_verifikasi == 'disetujui') bg-green-100 text-green-800
                                                @elseif($volunteer->status_verifikasi == 'ditolak') bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($volunteer->status_verifikasi) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.verifikasi-relawan.show', $volunteer->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-3 rounded text-sm">
                                                    Detail
                                                </a>
                                                @if($volunteer->status_verifikasi == 'pending')
                                                    <form action="{{ route('admin.verifikasi-relawan.verify', $volunteer->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-1 px-3 rounded text-sm">
                                                            Setujui
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.verifikasi-relawan.reject', $volunteer->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">
                                                            Tolak
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.verifikasi-relawan.destroy', $volunteer->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data relawan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white py-1 px-3 rounded text-sm">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if($volunteersByCampaign[$campaign->id]->count() > 5)
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 border-b border-gray-200 text-sm text-center text-gray-500">
                                            Dan {{ $volunteersByCampaign[$campaign->id]->count() - 5 }} lainnya...
                                            <a href="{{ route('admin.verifikasi-relawan.by-campaign', $campaign->id) }}" class="text-blue-500 hover:underline ml-2">Lihat Semua</a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            @endforeach
        @else
            <div class="card p-6 text-center">
                <p class="text-gray-500">Tidak ada pendaftaran relawan untuk kampanye manapun.</p>
            </div>
        @endif
</div>
@endsection