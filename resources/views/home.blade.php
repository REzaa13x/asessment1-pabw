<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonGiv</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1d4ed8', // biru utama
                        secondary: '#3b82f6', // biru lebih muda
                        accent: '#f59e0b', // warna aksen, misal: oranye
                        softblue: '#f0f5ff', // background lebih soft
                    }
                }
            }
        }
    </script>
    <style>
        /* Biar smooth pas scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-softblue font-sans">

    <header class="bg-white/80 backdrop-blur-sm shadow-sm fixed top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M50 75l-25-25c-10-10-15-20-5-30 10-10 25-10 35 0 10-10 25-10 35 0 10 10 5 20-5 30z"
                        fill="currentColor"/>
                    <text x="50" y="75" text-anchor="middle" font-family="Arial, sans-serif"
                          font-size="10" fill="currentColor" font-weight="bold">D</text>
                </svg>
                <div class="flex flex-col leading-tight">
                    <span class="text-xl font-bold text-primary">DonGiv</span>
                </div>
            </div>

            <nav class="hidden md:flex items-center space-x-8 font-medium">
                <a href="#donasi" class="text-gray-700 hover:text-primary transition">Donasi</a>
                <a href="#" class="text-gray-700 hover:text-primary transition">Galang Dana</a>
                <a href="#cara-kerja" class="text-gray-700 hover:text-primary transition">Cara Kerja</a>
                <a href="#" class="text-gray-700 hover:text-primary transition">Tentang Kami</a>
            </nav>

            <div class="flex items-center space-x-3">
                @auth
                    <!-- Profile dropdown when user is logged in -->
                    <div class="relative">
                        <button id="profileButton" class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-semibold hover:bg-blue-200 transition-colors" type="button">
                            <span class="font-bold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        </button>
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                            <a href="{{ route('profiles.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                                <i class="fas fa-user mr-2"></i>Profil Saya
                            </a>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Login and Register buttons when user is not logged in -->
                    <a href="{{ route('login') }}" class="px-5 py-2 rounded-full font-semibold border border-primary text-primary hover:bg-primary hover:text-white transition-all duration-300">Masuk</a>
                    <a href="{{ route('register') }}" class="px-5 py-2 rounded-full font-semibold bg-primary text-white hover:bg-blue-800 transition-all duration-300">Daftar</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        {{-- HERO SECTION --}}
        <section class="relative h-[60vh] md:h-[80vh] flex items-center justify-center text-white pt-20">
            <div class="absolute inset-0 bg-black/50 z-10"></div>
            <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover" alt="Hero Background">

            <div class="relative z-20 text-center max-w-4xl mx-auto px-4">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 drop-shadow-lg">Berdampak Nyata, Wujudkan Harapan Bersama</h1>
                <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto drop-shadow-md">Setiap donasi Anda menjadi energi bagi mereka yang membutuhkan. Mulai perjalanan kebaikanmu hari ini.</p>
                <a href="#donasi" class="bg-accent hover:bg-amber-500 text-white font-bold py-3 px-8 rounded-full text-lg transition-transform hover:scale-105">Donasi Sekarang</a>

                {{-- STATISTIK KUNCI --}}
                <div class="mt-16 bg-white/20 backdrop-blur-sm rounded-xl p-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div>
                        <p class="text-3xl font-bold">Rp 12 M+</p>
                        <p class="text-sm opacity-90">Donasi Tersalurkan</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">5.000+</p>
                        <p class="text-sm opacity-90">Penerima Manfaat</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">1.200+</p>
                        <p class="text-sm opacity-90">Campaign Berhasil</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- KENAPA KAMI? --}}
        <section class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Kenapa Berdonasi di DonasiKita?</h2>
                <p class="text-gray-600 mb-12 max-w-2xl mx-auto">Kami berkomitmen untuk menyalurkan bantuanmu secara transparan, mudah, dan tepat sasaran.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="flex flex-col items-center">
                        <div class="bg-secondary text-white rounded-full p-5 mb-4">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Terverifikasi & Aman</h3>
                        <p class="text-gray-500">Setiap kampanye galang dana telah melalui proses verifikasi yang ketat.</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-secondary text-white rounded-full p-5 mb-4">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Tepat Sasaran</h3>
                        <p class="text-gray-500">Bantuan disalurkan langsung kepada mereka yang paling membutuhkan.</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="bg-secondary text-white rounded-full p-5 mb-4">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Laporan Transparan</h3>
                        <p class="text-gray-500">Pantau perkembangan donasimu melalui laporan berkala yang kami sediakan.</p>
                    </div>
                </div>
            </div>
        </section>


        {{-- DAFTAR DONASI --}}
        <section id="donasi" class="py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Bantu Mereka yang Membutuhkan</h2>
                    <p class="text-gray-600 mt-2">Pilih kampanye yang ingin kamu bantu dan jadilah bagian dari perubahan.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if(isset($campaigns) && !empty($campaigns))
                        @foreach($campaigns as $campaign)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                                <img src="{{ $campaign->image }}" class="w-full h-52 object-cover" alt="{{ $campaign->title }}">
                                <div class="p-6 flex flex-col flex-grow">
                                    <span class="bg-blue-100 text-primary text-xs font-semibold px-2.5 py-1 rounded-full self-start mb-3">{{ $campaign->status }}</span>
                                    <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $campaign->title }}</h3>
                                    <p class="text-sm text-gray-500 mb-4">oleh <span class="font-semibold text-primary">DonGiv</span></p>

                                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
                                        <div class="bg-accent h-2.5 rounded-full" style="width: {{ min(100, ($campaign->current_amount / $campaign->target_amount) * 100) }}%"></div>
                                    </div>

                                    <div class="flex justify-between text-sm mb-4">
                                        <p class="font-semibold">Terkumpul: <span class="text-gray-800">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span></p>
                                        <p class="text-gray-500">{{ $campaign->end_date ? $campaign->end_date->format('d/m/Y') : 'Tidak ada batas' }}</p>
                                    </div>

                                    <button class="w-full mt-auto bg-primary text-white font-bold py-2.5 px-4 rounded-lg hover:bg-blue-800 transition-colors">Donasi Sekarang</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-full text-center py-12">
                            <div class="mx-auto w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-donate text-blue-500 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum ada kampanye</h3>
                            <p class="text-gray-500">Jadilah yang pertama mendukung kegiatan sosial melalui platform DonGiv</p>
                        </div>
                    @endif
                </div>
                @if(isset($campaigns) && !empty($campaigns))
                    <div class="text-center mt-12">
                        <a href="#" class="text-primary font-semibold hover:underline">Lihat Semua Kampanye <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                @endif
            </div>
        </section>

        {{-- CARA KERJA --}}
        <section id="cara-kerja" class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Hanya 3 Langkah Mudah untuk Berbagi</h2>
                    <p class="text-gray-600 mt-2">Mulai kebaikanmu dengan cara yang simpel dan cepat.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center relative">
                    <div class="hidden md:block absolute top-1/2 -translate-y-1/2 left-0 w-full h-0.5">
                        <svg width="100%" height="2">
                            <line x1="0" y1="1" x2="100%" y2="1" stroke="#d1d5db" stroke-width="2" stroke-dasharray="8 8" />
                        </svg>
                    </div>

                    <div class="relative z-10 bg-white p-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="flex items-center justify-center w-16 h-16 bg-primary text-white rounded-full text-2xl font-bold">1</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Pilih Kampanye</h3>
                        <p class="text-gray-500">Pilih kampanye donasi yang menyentuh hatimu.</p>
                    </div>
                    <div class="relative z-10 bg-white p-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="flex items-center justify-center w-16 h-16 bg-primary text-white rounded-full text-2xl font-bold">2</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Lakukan Donasi</h3>
                        <p class="text-gray-500">Isi nominal donasi dan pilih metode pembayaran yang kamu suka.</p>
                    </div>
                    <div class="relative z-10 bg-white p-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="flex items-center justify-center w-16 h-16 bg-primary text-white rounded-full text-2xl font-bold">3</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Dapatkan Laporan</h3>
                        <p class="text-gray-500">Terima update berkala mengenai penyaluran donasimu.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-gray-300">
        <div class="max-w-7xl mx-auto py-16 px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="md:col-span-1">
                    <h4 class="text-xl font-bold text-white mb-3">DonasiKita</h4>
                    <p class="text-sm">Platform donasi online yang aman dan terpercaya untuk menghubungkan kebaikanmu dengan mereka yang membutuhkan.</p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div>
                    <h5 class="font-semibold text-white mb-4">Jelajahi</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Kampanye Populer</a></li>
                        <li><a href="#" class="hover:underline">Donasi Mendesak</a></li>
                        <li><a href="#" class="hover:underline">Galang Dana</a></li>
                        <li><a href="#" class="hover:underline">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-white mb-4">Tentang</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                        <li><a href="#" class="hover:underline">Hubungi Kami</a></li>
                        <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:underline">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-white mb-4">Butuh Bantuan?</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">FAQ</a></li>
                        <li><a href="mailto:support@donasikita.com" class="hover:underline">support@donasikita.com</a></li>
                        <li><a href="tel:+62123456789" class="hover:underline">+62 123 456 789</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} DonasiKita — Bersama Kita Wujudkan Harapan 💙</p>
            </div>
        </div>
    </footer>

    <script>
        // Profile dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const profileButton = document.getElementById('profileButton');
            const profileDropdown = document.getElementById('profileDropdown');

            if (profileButton && profileDropdown) {
                profileButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    profileDropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
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