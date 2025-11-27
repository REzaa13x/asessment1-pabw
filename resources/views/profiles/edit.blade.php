<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Profil - DonGiv</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-br from-blue-50 to-cyan-50 text-gray-800">
    <!-- Header -->
    <header class="bg-white shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/dongiv-logo.png') }}" alt="DonGiv Logo" class="h-8">
                    <span class="text-xl font-bold text-primary">DonGiv</span>
                </div>
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary font-medium transition">
                    <i class="fas fa-home mr-1"></i>Beranda
                </a>
            </div>
        </div>
    </header>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-cyan-50 py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Edit Profil</h1>
                <p class="text-gray-600">Perbarui informasi akun Anda</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-3">
                                <i class="fas fa-check-circle text-xl mt-1"></i>
                            </div>
                            <div>
                                <p class="font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Profile Picture Section -->
                    <div class="flex flex-col items-center mb-8">
                        <div class="relative">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}"
                                     alt="Profile Photo"
                                     class="w-32 h-32 rounded-full object-cover border-4 border-blue-200 shadow-lg">
                            @else
                                <div class="w-32 h-32 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white text-5xl font-bold border-4 border-blue-200 shadow-lg">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                            <label for="photo" class="absolute bottom-2 right-2 bg-white rounded-full p-2 shadow-lg cursor-pointer">
                                <i class="fas fa-camera text-blue-600"></i>
                                <input type="file" name="photo" id="photo" class="hidden" accept="image/*">
                            </label>
                        </div>
                        <p class="mt-3 text-sm text-gray-600">Klik kamera untuk mengganti foto</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name', $user->name) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   value="{{ old('email', $user->email) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel"
                                   name="phone"
                                   id="phone"
                                   value="{{ old('phone', $user->phone) }}"
                                   placeholder="Contoh: 081234567890"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date"
                                   name="birth_date"
                                   id="birth_date"
                                   value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('birth_date') border-red-500 @enderror">
                            @error('birth_date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                        <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                        <a href="{{ route('profiles.index') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-xl transition-all duration-300 text-center">
                            <i class="fas fa-arrow-left mr-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center md:text-left">
                    <h4 class="text-xl font-bold text-white mb-4">DonGiv</h4>
                    <p class="text-sm">Creating positive change through transparent and effective charitable giving.</p>
                </div>
                <div class="text-center md:text-left">
                    <h5 class="font-semibold text-white mb-4">Explore</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('donation.details') }}" class="hover:text-white transition">Donations</a></li>
                        <li><a href="#" class="hover:text-white transition">Volunteer</a></li>
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                    </ul>
                </div>
                <div class="text-center md:text-left">
                    <h5 class="font-semibold text-white mb-4">Legal</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-white transition">Charity Registration</a></li>
                    </ul>
                </div>
                <div class="text-center md:text-left">
                    <h5 class="font-semibold text-white mb-4">Contact Us</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Support Center</a></li>
                        <li><a href="#" class="hover:text-white transition">Partnership Inquiry</a></li>
                        <li><a href="#" class="hover:text-white transition">Media Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-sm">
                <p>&copy; {{ date('Y') }} DonGiv — Making a Difference Together ❤️</p>
            </div>
        </div>
    </footer>
</body>
</html>