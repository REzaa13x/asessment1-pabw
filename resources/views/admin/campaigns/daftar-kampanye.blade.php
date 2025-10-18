@extends('admin.layouts.master') 
{{-- Asumsi Anda punya layout master.blade.php yang mencakup Bootstrap --}}

@section('title', 'Daftar Kampanye Donasi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: #003366;">Daftar Kampanye</h2>
    {{-- Tombol utama biru cerah --}}
    <a href="{{ route('admin.campaigns.create') }}" class="btn btn-primary" style="background-color: #007BFF; border-color: #007BFF;">
        + Tambah Kampanye Baru
    </a>
</div>

{{-- Tampilkan pesan flash jika ada --}}
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    {{-- Biru tua sebagai header tabel --}}
                    <tr style="background-color: #003366; color: white;">
                        <th>Judul</th>
                        <th>Target</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($campaigns as $campaign)
                    <tr>
                        <td style="color: #003366; font-weight: bold;">{{ $campaign['title'] }}</td>
                        <td>Rp{{ number_format($campaign['target_amount'], 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $campaign['status'] == 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ $campaign['status'] }}
                            </span>
                        </td>
                        <td>{{ date('d/m/Y', strtotime($campaign['created_at'])) }}</td>
                        <td>
                            {{-- Tombol Edit --}}
                            <a href="{{ route('admin.campaigns.edit', $campaign['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.campaigns.destroy', $campaign['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('PERINGATAN: Yakin ingin menghapus? Data akan hilang permanen karena tidak menggunakan database.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">Belum ada kampanye. Silahkan buat yang baru!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection