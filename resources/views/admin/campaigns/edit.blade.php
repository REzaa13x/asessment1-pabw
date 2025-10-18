@extends('admin.layouts.master')

@section('title', 'Edit Kampanye: ' . $campaign['title'])

@section('content')
<div class="card shadow mb-4" style="border-left: 5px solid #007BFF;">
    <div class="card-header py-3" style="background-color: #003366;">
        <h6 class="m-0 font-weight-bold text-white">Edit Kampanye Donasi</h6>
    </div>
    <div class="card-body">
        
        {{-- UPDATE menggunakan method PUT/PATCH --}}
        <form action="{{ route('admin.campaigns.update', $campaign['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label" style="color: #003366;">Judul Kampanye</label>
                {{-- Tampilkan data lama --}}
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $campaign['title']) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label for="target_amount" class="form-label" style="color: #003366;">Target Donasi (Rp)</label>
                <input type="number" class="form-control @error('target_amount') is-invalid @enderror" id="target_amount" name="target_amount" value="{{ old('target_amount', $campaign['target_amount']) }}" required min="1000">
                @error('target_amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label" style="color: #003366;">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $campaign['description']) }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-4">
                <label for="end_date" class="form-label" style="color: #003366;">Batas Akhir (Opsional)</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $campaign['end_date'] ?? '') }}">
                @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <button type="submit" class="btn btn-primary" style="background-color: #007BFF; border-color: #007BFF;">
                <i class="fas fa-edit"></i> Perbarui Kampanye
            </button>
            <a href="{{ route('admin.campaigns.index') }}" class="btn btn-secondary">Batal</a>
            
        </form>
    </div>
</div>
@endsection