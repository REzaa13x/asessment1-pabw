@extends('admin.layouts.master')

@section('content')
<div class="max-w-4xl mx-auto p-4 sm:p-6">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex items-center">
                <i class="fas fa-plus-circle text-blue-600 text-2xl mr-3"></i>
                <h1 class="text-2xl font-bold text-gray-800">Buat Kampanye Relawan Baru</h1>
            </div>
        </div>

        <form action="{{ route('admin.relawan.store') }}" method="POST" class="p-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-image text-purple-500 mr-2"></i> Gambar Kampanye
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold">Klik untuk upload</span> atau seret file ke sini
                                </p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF (MAX. 2MB)</p>
                            </div>
                            <input id="image" name="image" type="file" class="hidden" accept="image/*" />
                        </label>
                    </div>
                    @error('image')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-heading text-blue-500 mr-2"></i> Judul Kampanye
                    </label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                    @error('judul')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-map-marker-alt text-green-500 mr-2"></i> Lokasi
                    </label>
                    <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                    @error('lokasi')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-toggle-on text-yellow-500 mr-2"></i> Status
                    </label>
                    <select name="status" id="status" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        <option value="">Pilih Status</option>
                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-calendar-alt text-purple-500 mr-2"></i> Tanggal Mulai
                    </label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                    @error('tanggal_mulai')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-calendar-check text-indigo-500 mr-2"></i> Tanggal Selesai
                    </label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                    @error('tanggal_selesai')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3 px-6 rounded-lg flex items-center justify-center transition-all duration-200 shadow-md hover:shadow-lg">
                    <i class="fas fa-save mr-2"></i> Simpan Kampanye Relawan
                </button>
                <a href="{{ route('admin.relawan.index') }}" class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white py-3 px-6 rounded-lg flex items-center justify-center transition-all duration-200 shadow-sm hover:shadow-md">
                    <i class="fas fa-times mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection