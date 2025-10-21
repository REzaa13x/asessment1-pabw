@extends('admin.layouts.master')

@section('title', 'Tambah Notifikasi')

@section('content')
<div class="card shadow p-4">
    <h4 class="mb-4" style="color:#003366;">Tambah Notifikasi Baru</h4>

    <form method="POST" action="{{ route('admin.notifications.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul Notifikasi</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pesan</label>
            <textarea name="message" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.notifications.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
