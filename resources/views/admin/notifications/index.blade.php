@extends('admin.layouts.master')

@section('title', 'Notifikasi Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: #003366;">Daftar Notifikasi</h2>
    <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary">+ Tambah Notifikasi</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (empty($notifications))
    <div class="alert alert-info text-center">Belum ada notifikasi.</div>
@else
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead style="background-color: #003366; color:white;">
                    <tr>
                        <th>Judul</th>
                        <th>Pesan</th>
                        <th>Dibuat Pada</th>
                        <th>Update Terakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>{{ $notification['title'] }}</td>
                            <td>{{ $notification['message'] }}</td>
                            <td>{{ $notification['created_at'] ?? '-' }}</td>
                            <td>{{ $notification['updated_at'] ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.notifications.edit', $notification['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.notifications.destroy', $notification['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus notifikasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
