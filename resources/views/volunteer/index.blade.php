<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonGiv - Bergabung sebagai Relawan</title>
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
        html {
            scroll-behavior: smooth;
        }

        /* Style untuk panah di <details> (FAQ) */
        summary {
            list-style: none;
        }

        summary::-webkit-details-marker {
            display: none;
        }

        summary::after {
            content: '\f078';
            /* Font Awesome chevron down */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            float: right;
            transition: transform 0.2s ease;
        }

        details[open] summary::after {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="bg-softblue font-sans">

    {{-- Header (Sama seperti sebelumnya) --}}
    <header class="bg-white/80 backdrop-blur-sm shadow-sm fixed top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/dongiv-logo.png') }}" alt="DonGiv Logo" class="h-8">
            </a>

            {{-- Navigasi --}}
            <nav class="hidden md:flex items-center space-x-8 font-medium">
                <a href="{{ url('/') }}#donasi" class="text-gray-700 hover:text-primary transition">Donasi</a>
                <a href="{{ url('/') }}#" class="text-gray-700 hover:text-primary transition">Galang Dana</a>
                <a href="{{ route('volunteer') }}" class="text-primary font-semibold transition">Relawan</a>
                <a href="{{ url('/') }}#cara-kerja" class="text-gray-700 hover:text-primary transition">Cara Kerja</a>
                <a href="{{ url('/') }}#" class="text-gray-700 hover:text-primary transition">Tentang Kami</a>
            </nav>

            {{-- Tombol Auth --}}
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
                        {{-- ... (link profile dropdown) ... --}}
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </header>

    <main>
        <style>
            @keyframes waveMove {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }

            .wave-1 {
                animation: waveMove 12s linear infinite;
            }

            .wave-2 {
                animation: waveMove 18s linear infinite;
            }
        </style>

        <section class="relative h-[65vh] md:h-[85vh] flex items-center justify-center text-white pt-20 overflow-hidden bg-gradient-to-b from-primary to-primary/70">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-primary/60 z-10"></div>

            <!-- Background Image -->
            <img
                src="https://images.unsplash.com/photo-1593113598332-cd288d649414?q=80&w=2070&auto=format&fit=crop"
                class="absolute inset-0 w-full h-full object-cover opacity-20"
                alt="Tim Relawan DonGiv Beraksi">

            <!-- Content -->
            <div class="relative z-20 text-center max-w-4xl mx-auto px-4">
                <span class="inline-block bg-white/20 text-white text-sm font-semibold px-4 py-1 rounded-full mb-4 backdrop-blur-sm">
                    Gabung #PasukanKebaikan
                </span>

                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 drop-shadow-lg">
                    Waktu Luangmu, Harapan Baru Mereka.
                </h1>

                <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto drop-shadow-md">
                    Kami bukan cuma nyari relawan. Kami nyari kamu yang mau jadi bagian dari cerita perubahan. Jadilah tangan, mata, dan hati kebaikan bersama DonGiv.
                </p>

                <a
                    href="{{ route('volunteer.register') }}"
                    class="bg-accent hover:bg-amber-500 text-white font-bold py-3 px-8 rounded-full text-lg transition-transform hover:scale-105 shadow-lg">
                    Gabung Sekarang
                </a>
            </div>

            <!-- Animated Waves -->
            <div class="absolute bottom-0 left-0 w-full h-[120px] overflow-hidden z-20">

                <!-- Wave 1 -->
                <svg class="wave-1 absolute bottom-0 left-0 w-[200%] h-full opacity-70" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#7aa2ff"
                        d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,149.3C672,149,768,171,864,192C960,213,1056,235,1152,229.3C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>

                <!-- Wave 2 -->
                <svg class="wave-2 absolute bottom-0 left-0 w-[200%] h-full opacity-40" viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="#ffffff"
                        d="M0,224L48,218.7C96,213,192,203,288,181.3C384,160,480,128,576,144C672,160,768,224,864,229.3C960,235,1056,181,1152,176C1248,171,1344,213,1392,234.7L1440,256L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
                    </path>
                </svg>

            </div>
        </section>

        <section class="bg-white py-16" id="stats-section">
            <div class="max-w-6xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div>
                        <p class="text-4xl md:text-5xl font-extrabold text-primary" data-scramble-target="1,200+">0,000+</p>
                        <p class="text-lg text-gray-600 mt-2">Relawan Terdaftar</p>
                    </div>
                    <div>
                        <p class="text-4xl md:text-5xl font-extrabold text-primary" data-scramble-target="8,500+">0,000+</p>
                        <p class="text-lg text-gray-600 mt-2">Jam Kontribusi</p>
                    </div>
                    <div>
                        <p class="text-4xl md:text-5xl font-extrabold text-primary" data-scramble-target="300+">000+</p>
                        <p class="text-lg text-gray-600 mt-2">Program Terselesaikan</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-softblue">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-800">Lebih dari Sekadar Membantu</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Ini bukan cuma soal ngasih waktu, tapi soal apa yang kamu dapetin kembali.</p>
                </div>

                {{-- Poin 1: Dampak Nyata --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                    <div>
                        {{-- Ganti dengan foto aksi nyata --}}
                        <img src="https://images.unsplash.com/photo-1518395689561-9c603f0474b3?q=80&w=1974&auto=format&fit=crop" alt="Relawan Menyalurkan Bantuan" class="rounded-xl shadow-2xl w-full h-full object-cover">
                    </div>
                    <div>
                        <i class="fas fa-heart text-primary text-3xl mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">Rasakan Dampak Nyata</h3>
                        <p class="text-gray-600 mb-4">Kamu akan terlibat langsung di lapangan, melihat senyum penerima manfaat, dan jadi saksi bahwa bantuanmu sampai tepat sasaran.</p>
                        <a href="#gabung-relawan" class="font-semibold text-primary hover:text-blue-800 transition">Lihat program kami <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                {{-- Poin 2: Jaringan & Skill --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="md:order-last">
                        {{-- Ganti dengan foto tim relawan --}}
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop" alt="Komunitas Relawan DonGiv" class="rounded-xl shadow-2xl w-full h-full object-cover">
                    </div>
                    <div>
                        <i class="fas fa-users text-primary text-3xl mb-4"></i>
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">Keluarga & Keahlian Baru</h3>
                        <p class="text-gray-600 mb-4">Bertemu orang-orang se-frekuensi, bangun jaringan profesional, dan asah *skill* baru (leadership, komunikasi, manajemen acara) yang gak diajarin di kampus.</p>
                        <a href="#testimonial" class="font-semibold text-primary hover:text-blue-800 transition">Dengar cerita mereka <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="story-and-testimonial" class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6">

                <!-- HEADER -->
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-800">Cerita & Suara #PasukanKebaikan</h2>
                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Kenapa kami ada, dan kenapa mereka bertahan.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                    <div>
                        <span class="inline-block text-primary font-semibold mb-2">The Origin Story</span>
                        <h3 class="text-3xl font-bold text-gray-800 mb-6">
                            Bukan Sekadar Hashtag. Ini Cerita Kita.
                        </h3>

                        <div class="prose prose-lg text-gray-600 max-w-none">
                            <p>
                                Jujur? <strong>#PasukanKebaikan</strong> itu lahir dari obrolan warteg 5 mahasiswa
                                (mungkin kayak lo di Telkom) yang bosen cuma "amin-in" doa di medsos tiap ada bencana.
                            </p>
                            <p>
                                Nama <strong>"Pasukan"</strong> kami pilih karena kami mau gerak cepet, taktis, dan terorganisir.
                                Nama <strong>"Kebaikan"</strong> kami pilih karena itu satu-satunya misi kami.
                            </p>
                            <p>
                                Dari 5 orang di tahun 2023, sekarang kita jadi keluarga besar <code>1,200+</code> relawan.
                                Ini bukan cuma *platform* donasi, ini adalah gerakan. Dan lo, adalah bagian penting
                                selanjutnya dari cerita ini.
                            </p>
                        </div>

                        <a href="#gabung-relawan"
                            class="mt-8 inline-block bg-primary hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg transition-transform hover:scale-105 shadow-lg">
                            Jadi Bagian dari Cerita
                        </a>
                    </div>

                    <div class="relative w-full bg-softblue rounded-xl shadow-xl overflow-hidden min-h-[420px] flex items-center">

                        <!-- TRACK -->
                        <div id="testimonial-slider" class="flex transition-transform duration-700 ease-out w-full">

                            <!-- Slide 1 -->
                            <div class="min-w-full p-10 flex flex-col items-center text-center">
                                <i class="fas fa-quote-left text-primary text-4xl mb-6"></i>
                                <p class="text-gray-700 italic text-lg mb-8 leading-relaxed">
                                    "Gabung DonGiv ngubah cara pandang gue. Gue kira gue mau bantu orang,
                                    ternyata gue yang lebih banyak dibantu: jadi lebih sabar dan bersyukur."
                                </p>
                                <img src="https://i.pravatar.cc/150?img=11"
                                    class="w-16 h-16 rounded-full object-cover mb-3" alt="Relawan">
                                <p class="font-bold text-gray-800 text-lg">Aisha Putri</p>
                                <p class="text-sm text-gray-500">Relawan (Tim Edukasi)</p>
                            </div>

                            <!-- Slide 2 -->
                            <div class="min-w-full p-10 flex flex-col items-center text-center">
                                <i class="fas fa-quote-left text-primary text-4xl mb-6"></i>
                                <p class="text-gray-700 italic text-lg mb-8 leading-relaxed">
                                    "Awalnya ragu, takut repot. Ternyata sistemnya jelas, timnya asik,
                                    dan liat anak-anak panti senyum pas kita dateng... worth it banget!"
                                </p>
                                <img src="https://i.pravatar.cc/150?img=32"
                                    class="w-16 h-16 rounded-full object-cover mb-3" alt="Relawan">
                                <p class="font-bold text-gray-800 text-lg">Budi Santoso</p>
                                <p class="text-sm text-gray-500">Relawan (Tim Lapangan)</p>
                            </div>

                            <!-- Slide 3 -->
                            <div class="min-w-full p-10 flex flex-col items-center text-center">
                                <i class="fas fa-quote-left text-primary text-4xl mb-6"></i>
                                <p class="text-gray-700 italic text-lg mb-8 leading-relaxed">
                                    "Sebagai desainer, gue seneng banget bisa nyumbang skill buat bikin materi kampanye.
                                    Gak harus turun langsung, tapi dampaknya kerasa."
                                </p>
                                <img src="https://i.pravatar.cc/150?img=26"
                                    class="w-16 h-16 rounded-full object-cover mb-3" alt="Relawan">
                                <p class="font-bold text-gray-800 text-lg">Citra Lestari</p>
                                <p class="text-sm text-gray-500">Relawan (Tim Kreatif)</p>
                            </div>

                        </div>

                        <!-- DOTS -->
                        <div id="slider-dots" class="absolute bottom-6 left-0 right-0 flex justify-center space-x-2"></div>
                    </div>
                </div>
            </div>
        </section>


        {{-- JAVASCRIPT SLIDER --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                const slider = document.getElementById("testimonial-slider");
                const slideCount = slider.children.length;
                const dotsContainer = document.getElementById("slider-dots");

                let index = 0;

                // Generate dots
                for (let i = 0; i < slideCount; i++) {
                    const dot = document.createElement("div");
                    dot.className = "w-3 h-3 bg-gray-300 rounded-full cursor-pointer transition-all";
                    if (i === 0) dot.classList.add("bg-primary");
                    dot.onclick = () => moveTo(i);
                    dotsContainer.appendChild(dot);
                }

                const dots = dotsContainer.children;

                function moveTo(i) {
                    index = i;
                    slider.style.transform = `translateX(-${i * 100}%)`;

                    [...dots].forEach(d => d.classList.remove("bg-primary"));
                    dots[i].classList.add("bg-primary");
                }

                // Auto slide
                setInterval(() => {
                    index = (index + 1) % slideCount;
                    moveTo(index);
                }, 5000);

            });
        </script>


        {{-- AREA FOKUS (Masih sama, tapi desain card dipermanis) --}}
        <section class="py-20 bg-softblue">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Cari Peran yang Paling 'Kamu Banget'</h2>
                    <p class="text-gray-600 mt-2">Gak semua harus ke lapangan. Kontribusimu bisa dalam banyak bentuk.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Card 1 (di-desain ulang) --}}
                    <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="bg-accent/20 text-accent rounded-full w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fas fa-hands-helping fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Relawan Lapangan</h3>
                        <p class="text-gray-600">Turun langsung menyalurkan bantuan, asesmen kebutuhan, dan interaksi dengan penerima manfaat.</p>
                    </div>
                    {{-- Card 2 --}}
                    <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="bg-accent/20 text-accent rounded-full w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fas fa-camera fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Tim Kreatif</h3>
                        <p class="text-gray-600">Bantu bikin desain visual, video, dan konten media sosial yang nendang.</p>
                    </div>
                    {{-- Card 3 --}}
                    <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="bg-accent/20 text-accent rounded-full w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fas fa-chalkboard-teacher fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Pengajar & Mentor</h3>
                        <p class="text-gray-600">Berbagi ilmu dan keahlianmu di program-program edukasi kami.</p>
                    </div>
                    {{-- Card 4 --}}
                    <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="bg-accent/20 text-accent rounded-full w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fas fa-laptop-code fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Dukungan Teknis</h3>
                        <p class="text-gray-600">Punya *skill* IT, web, atau data? Bantuanmu sangat kami butuhkan!</p>
                    </div>
                    {{-- Card 5 --}}
                    <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="bg-accent/20 text-accent rounded-full w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fas fa-bullhorn fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Penggalang Dana</h3>
                        <p class="text-gray-600">Bantu kami menjangkau lebih banyak donatur dan partner kebaikan.</p>
                    </div>
                    {{-- Card 6 --}}
                    <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 hover:shadow-xl transition-all duration-300">
                        <div class="bg-accent/20 text-accent rounded-full w-16 h-16 flex items-center justify-center mb-5">
                            <i class="fas fa-calendar-check fa-2x"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Event & Logistik</h3>
                        <p class="text-gray-600">Si paling jago ngatur acara dan memastikan semua berjalan mulus.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="gabung-relawan" class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">3 Langkah Jadi #PasukanKebaikan</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center relative">
                    {{-- ... (Kode garis putus-putus) ... --}}
                    <div class="hidden md:block absolute top-1/2 -translate-y-1/2 left-0 w-full h-0.5">
                        <svg width="100%" height="2">
                            <line x1="0" y1="1" x2="100%" y2="1" stroke="#d1d5db" stroke-width="2" stroke-dasharray="8 8" />
                        </svg>
                    </div>
                    <div class="relative z-10 bg-white p-4">
                        <div class_alias="flex justify-center items-center mb-4">
                            <span class="flex items-center justify-center w-16 h-16 bg-primary text-white rounded-full text-2xl font-bold shadow-lg">1</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Isi Formulir</h3>
                        <p class="text-gray-500">Klik 'Daftar Sekarang' dan isi data dirimu. Cuma 5 menit.</p>
                    </div>
                    <div class="relative z-10 bg-white p-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="flex items-center justify-center w-16 h-16 bg-primary text-white rounded-full text-2xl font-bold shadow-lg">2</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Seleksi & Wawancara</h3>
                        <p class="text-gray-500">Tim kami akan menghubungimu untuk ngobrol santai.</p>
                    </div>
                    <div class="relative z-10 bg-white p-4">
                        <div class="flex justify-center items-center mb-4">
                            <span class="flex items-center justify-center w-16 h-16 bg-primary text-white rounded-full text-2xl font-bold shadow-lg">3</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Selamat Bergabung!</h3>
                        <p class="text-gray-500">Kamu akan kami undang ke grup koordinasi dan siap beraksi.</p>
                    </div>
                </div>
                <div class="text-center mt-16">
                    <a href="{{ route('volunteer.register') }}" class="bg-primary hover:bg-blue-800 text-white font-bold py-4 px-10 rounded-full text-lg transition-transform hover:scale-105 shadow-lg">Daftar Sekarang</a>
                </div>
            </div>
        </section>

        <section class="py-20 bg-primary text-white">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-extrabold mb-4">Ini yang Kamu Bawa Pulang</h2>
                <p class="text-lg opacity-90 mb-12 max-w-2xl mx-auto">
                    Kami percaya kontribusimu sangat berharga. Ini apresiasi dari kami,
                    selain hati yang (pastinya) gembira.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- Benefit 1: Sertifikat -->
                    <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm transform hover:scale-105 transition-transform">
                        <div class="text-accent text-4xl mb-4">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Sertifikat Profesional</h3>
                        <p class="text-sm opacity-80">
                            Sertifikat resmi yang bisa lo pake buat nambahin "amunisi" di CV atau LinkedIn.
                        </p>
                    </div>

                    <!-- Benefit 2: Networking -->
                    <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm transform hover:scale-105 transition-transform">
                        <div class="text-accent text-4xl mb-4">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Jaringan & Mentoring</h3>
                        <p class="text-sm opacity-80">
                            Akses ke komunitas profesional, mentor, dan temen se-frekuensi dari berbagai industri.
                        </p>
                    </div>

                    <!-- Benefit 3: Skill Baru -->
                    <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm transform hover:scale-105 transition-transform">
                        <div class="text-accent text-4xl mb-4">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Pengembangan Skill</h3>
                        <p class="text-sm opacity-80">
                            Belajar *leadership*, *project management*, dan komunikasi langsung di lapangan.
                        </p>
                    </div>

                    <!-- Benefit 4: Merchandise -->
                    <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm transform hover:scale-105 transition-transform">
                        <div class="text-accent text-4xl mb-4">
                            <i class="fas fa-shirt"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Merchandise Eksklusif</h3>
                        <p class="text-sm opacity-80">
                            Kit eksklusif #PasukanKebaikan (kaos, stiker, dll) sebagai tanda kebanggaanmu.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        {{-- FAQ (BARU) - Ini buat ngilangin "kurang yakin" --}}
        <section class="py-20 bg-softblue">
            <div class="max-w-4xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Masih Ragu?</h2>
                    <p class="text-gray-600 mt-2">Kami jawab pertanyaan yang paling sering bikin penasaran.</p>
                </div>
                <div class="bg-white rounded-xl shadow-xl p-6 md:p-8">
                    <details class="border-b py-4">
                        <summary class="text-lg font-semibold text-gray-800 cursor-pointer">Apakah saya harus punya keahlian khusus?</summary>
                        <p class="mt-3 text-gray-600">Niat adalah keahlian utamamu! Kami punya banyak peran. Untuk peran teknis (seperti Tim Kreatif/IT), keahlian spesifik akan jadi nilai plus. Tapi untuk Tim Lapangan, yang penting semangat!</p>
                    </details>
                    <details class="border-b py-4">
                        <summary class="text-lg font-semibold text-gray-800 cursor-pointer">Berapa banyak waktu yang harus saya luangkan?</summary>
                        <p class="mt-3 text-gray-600">Fleksibel! Kami ada program berbasis proyek (sekali acara) dan ada yang rutin. Kamu bisa pilih yang paling sesuai dengan jadwalmu. Kami menghargai setiap menit waktumu.</p>
                    </details>
                    <details class="border-b py-4">
                        <summary class="text-lg font-semibold text-gray-800 cursor-pointer">Apakah saya akan dapat sertifikat?</summary>
                        <p class="mt-3 text-gray-600">Ya! Kami akan memberikan e-sertifikat sebagai tanda apresiasi atas kontribusimu setelah menyelesaikan periode atau program tertentu.</p>
                    </details>
                    <details class="py-4">
                        <summary class="text-lg font-semibold text-gray-800 cursor-pointer">Saya di luar kota, apakah bisa gabung?</summary>
                        <p class="mt-3 text-gray-600">Sangat bisa! Banyak peran di Tim Kreatif, Dukungan Teknis, atau Penggalang Dana yang bisa dilakukan 100% secara *remote* (online). Kebaikan gak kenal batas, kan?</p>
                    </details>
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

    {{-- Script Dropdown (Sama seperti sebelumnya) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Fungsi "Mesin Acak"
            const scramble = (element) => {
                const targetText = element.getAttribute('data-scramble-target');
                const chars = '0123456789'; // Karakter buat ngacak
                let iteration = 0;

                // Hapus interval lama jika ada (buat jaga-jaga)
                if (element.scrambleInterval) clearInterval(element.scrambleInterval);

                element.scrambleInterval = setInterval(() => {
                    element.innerText = element.innerText.split('')
                        .map((char, index) => {
                            // Kalo indexnya udah "kebuka", pake karakter asli
                            if (index < iteration) {
                                return targetText[index];
                            }

                            // Biarin koma dan plus tetep di tempatnya
                            if (targetText[index] === ',' || targetText[index] === '+') {
                                return targetText[index];
                            }

                            // Kalo belom, acak!
                            return chars[Math.floor(Math.random() * chars.length)];
                        })
                        .join('');

                    // Kalo udah selesai, beresin & stop
                    if (iteration >= targetText.length) {
                        clearInterval(element.scrambleInterval);
                        element.innerText = targetText; // Pastiin 100% bener
                    }

                    // Nentuin seberapa cepet kebuka
                    iteration += targetText.length / 15; // Selesai dalam ~15 frame
                }, 50); // 50ms = seberapa cepet angkanya ganti
            };

            // 2. Fungsi "Mata-mata" (Intersection Observer)
            const statsSection = document.getElementById('stats-section');
            const scrambleElements = document.querySelectorAll('[data-scramble-target]');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    // Kalo section-nya keliatan di layar
                    if (entry.isIntersecting) {
                        // Jalanin animasinya buat tiap angka
                        scrambleElements.forEach(el => scramble(el));

                        // Stop "mata-mata" nya biar gak ngulang animasi
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.4 // Jalanin pas 40% section-nya keliatan
            });

            // 3. Mulai "mata-mata"
            if (statsSection) {
                observer.observe(statsSection);
            }
            // --- SELESAI KODE ANIMASI SCRAMBLE ---
        });
    </script>
</body>

</html>