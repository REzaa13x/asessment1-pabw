@extends('admin.layouts.master')

@section('title', 'Kelola Profil')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: #003366;">Kelola Profil</h2>
    <a href="{{ route('profiles.create') }}" class="btn btn-primary" style="background-color: #007BFF; border-color: #007BFF;">
        + Tambah Profil
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr style="background-color: #003366; color: white;">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($profiles as $p)
                    <tr>
                        <td>{{ $p['id'] }}</td>
                        <td style="color: #003366; font-weight: bold;">{{ $p['name'] }}</td>
                        <td>{{ $p['email'] }}</td>
                        <td>{{ $p['age'] }}</td>
                        <td>
                            <a href="{{ route('profiles.edit', $p['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('profiles.destroy', $p['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus profil ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">Belum ada profil tersimpan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
