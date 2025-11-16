<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonGiv - Daftar Relawan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1d4ed8',
                        secondary: '#3b82f6',
                        accent: '#f59e0b',
                        softblue: '#f0f5ff',
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-softblue font-sans">

    <header class="bg-white/80 backdrop-blur-sm shadow-sm fixed top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/dongiv-logo.png') }}" alt="DonGiv Logo" class="h-8">
            </a>
            <nav class="hidden md:flex items-center space-x-8 font-medium">
                <a href="{{ url('/') }}#donasi" class="text-gray-700 hover:text-primary transition">Donasi</a>
                <a href="{{ url('/') }}#" class="text-gray-700 hover:text-primary transition">Galang Dana</a>
                <a href="{{ route('volunteer') }}" class="text-gray-700 hover:text-primary transition">Relawan</a>
                <a href="{{ url('/') }}#cara-kerja" class="text-gray-700 hover:text-primary transition">Cara Kerja</a>
                <a href="{{ url('/') }}#" class="text-gray-700 hover:text-primary transition">Tentang Kami</a>
            </nav>
            <div class="flex items-center space-x-3">
                @guest
                <a href="{{ route('login') }}" class="px-5 py-2 rounded-full font-semibold border border-primary text-primary hover:bg-primary hover:text-white transition-all duration-300">Masuk</a>
                <a href="{{ route('register') }}" class="px-5 py-2 rounded-full font-semibold bg-primary text-white hover:bg-blue-800 transition-all duration-300">Daftar</a>
                @else
                <div class="relative">
                    <button id="profileButton" class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-semibold hover:bg-blue-200 transition-colors" type="button">
                        <span class="font-bold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    </button>
                    <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        {{-- (Isi dropdown profile lo) --}}
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Profil Saya</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </header>

    <main class="pt-32 pb-20">
        <div class="max-w-3xl mx-auto bg-white p-8 md:p-12 rounded-xl shadow-xl">

            <h1 class="text-3xl font-bold text-gray-800 mb-2">Formulir #PasukanKebaikan</h1>
            <p class="text-gray-600 mb-8">Tinggal satu langkah lagi buat gabung. Isi data di bawah ini, ya!</p>

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <strong class="font-bold">Oops!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('volunteer.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                            value="{{ old('name', $user->name ?? '') }}" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                        <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                            value="{{ old('email', $user->email ?? '') }}" required>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp Aktif</label>
                    <input type="tel" name="phone" id="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                        value="{{ old('phone') }}" required placeholder="08123456789">
                </div>

                <div class="mt-6">
                    <label for="motivation" class="block text-sm font-medium text-gray-700 mb-1">Motivasi Gabung</label>
                    <textarea name="motivation" id="motivation" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                        placeholder="Ceritain kenapa kamu tertarik jadi relawan..." required>{{ old('motivation') }}</textarea>
                </div>

                <div class="mt-6">
                    <label for="skills" class="block text-sm font-medium text-gray-700 mb-1">Keahlian (Opsional)</label>
                    <input type="text" name="skills" id="skills" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary"
                        value="{{ old('skills') }}" placeholder="Misal: Desain Grafis, Videografi, Public Speaking">
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg text-lg hover:bg-blue-800 transition-colors">
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>

        </div>
    </main>

    <footer class="bg-gray-800 text-gray-300">
        <div class="max-w-7xl mx-auto py-16 px-6">
            {{-- (Ini contoh footer, ganti sama footer lo yang asli kalo beda) --}}
            <div class="text-center text-sm">
                <p>&copy; {{ date('Y') }} DonGiv — Bersama Kita Wujudkan Harapan 💙</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileButton = document.getElementById('profileButton');
            const profileDropdown = document.getElementById('profileDropdown');

            if (profileButton && profileDropdown) {
                profileButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    profileDropdown.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                        profileDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>

</html>