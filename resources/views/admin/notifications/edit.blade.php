@extends('admin.layouts.master')

@section('title', 'Edit Notifikasi')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Edit Notifikasi</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.notifications.update', $notification['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="title" value="{{ old('title', $notification['title']) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Notifikasi</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message', $notification['message']) }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.notifications.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
