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

        summary {
            list-style: none;
        }

        summary::-webkit-details-marker {
            display: none;
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
                <a href="{{ route('volunteer') }}" class="text-primary font-semibold transition">Relawan</a>
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
                        {{-- ... (link profile dropdown) ... --}}
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </header>

    <main>
        <section class="relative pt-32 pb-40 lg:pt-40 lg:pb-48 overflow-visible bg-surface">

            <div class="absolute top-0 right-0 -z-10 opacity-30 translate-x-1/2 -translate-y-1/4">
                <svg viewBox="0 0 500 500" class="w-[800px] h-[800px] text-blue-100 fill-current animate-pulse" style="animation-duration: 10s;">
                    <path d="M453.9,398.5C416.6,444.5,362.4,483.3,302.7,493.4C243,503.5,177.8,484.9,126.3,447.6C74.8,410.3,37,354.3,25.2,293.1C13.4,231.9,27.6,165.5,69.4,116.3C111.2,67.1,180.6,35.1,248.9,32.9C317.2,30.7,384.4,58.3,427.7,108.6C471,158.9,490.4,231.9,453.9,398.5Z" />
                </svg>
            </div>

            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                    <div class="max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-orange-50 border border-orange-100 text-accent font-bold text-xs uppercase tracking-wider mb-8">
                            <i class="fas fa-fire"></i> Bergabung dengan 5.000+ Relawan
                        </div>

                        <h1 class="text-5xl lg:text-7xl font-extrabold text-dark leading-[1.1] mb-6">
                            Ubah Niat Baik <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-blue-400">Jadi Aksi Nyata.</span>
                        </h1>

                        <p class="text-lg text-slate-500 mb-10 leading-relaxed">
                            Dunia butuh lebih banyak orang peduli sepertimu. Pilih isumu, turun ke jalan, dan rasakan kebahagiaan yang tak ternilai harganya.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('volunteer.campaigns') }}" class="inline-flex justify-center items-center gap-3 bg-primary hover:bg-blue-700 text-white text-lg font-bold py-4 px-8 rounded-2xl transition-all transform hover:-translate-y-1 shadow-xl shadow-blue-200">
                                Cari Misi Sekarang <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="#benefit" class="inline-flex justify-center items-center gap-3 bg-white border-2 border-slate-200 hover:border-primary text-slate-600 hover:text-primary font-bold py-4 px-8 rounded-2xl transition-all">
                                <i class="far fa-play-circle text-xl"></i> Tonton Video
                            </a>
                        </div>

                        <div class="mt-12 flex items-center gap-4">
                            <div class="flex -space-x-4">
                                <img class="w-12 h-12 rounded-full border-4 border-surface object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100" alt="">
                                <img class="w-12 h-12 rounded-full border-4 border-surface object-cover" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=100" alt="">
                                <div class="w-12 h-12 rounded-full border-4 border-surface bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">+2k</div>
                            </div>
                            <div>
                                <div class="flex text-yellow-400 text-sm mb-1">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <p class="text-sm text-slate-500 font-medium">Komunitas Relawan Terbaik</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative hidden lg:block">
                        <div class="relative z-10 rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white transform rotate-2 hover:rotate-0 transition-transform duration-500">
                            <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?q=80&w=2074&auto=format&fit=crop"
                                alt="Volunteer Team"
                                class="w-full h-[500px] object-cover hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            <div class="absolute bottom-8 left-8 text-white">
                                <p class="text-sm font-bold text-yellow-400 uppercase tracking-wider mb-1">Event Terakhir</p>
                                <p class="text-2xl font-extrabold">Distribusi Pangan Desa</p>
                            </div>
                        </div>

                        <div class="absolute -bottom-10 -right-8 z-20 bg-white p-5 rounded-2xl shadow-xl border border-slate-50 max-w-[200px]">
                            <div class="flex items-center gap-2 mb-2">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100" class="w-8 h-8 rounded-full object-cover">
                                <div>
                                    <p class="text-xs font-bold text-dark">Raka A.</p>
                                    <p class="text-[10px] text-slate-400">Baru bergabung</p>
                                </div>
                            </div>
                            <p class="text-xs text-slate-600 italic">"Pengalaman seru banget bisa turun langsung!"</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute -bottom-16 left-0 w-full z-20 px-6">
                <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] p-8 md:p-10 flex flex-col md:flex-row justify-around items-center gap-8 border border-slate-100">

                    <div class="text-center">
                        <p class="text-4xl md:text-5xl font-extrabold text-primary mb-1">1.200+</p>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wide">Relawan Terdaftar</p>
                    </div>

                    <div class="hidden md:block w-px h-16 bg-slate-100"></div>

                    <div class="text-center">
                        <p class="text-4xl md:text-5xl font-extrabold text-dark mb-1">8.500+</p>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wide">Jam Kontribusi</p>
                    </div>

                    <div class="hidden md:block w-px h-16 bg-slate-100"></div>

                    <div class="text-center">
                        <p class="text-4xl md:text-5xl font-extrabold text-green-600 mb-1">300+</p>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wide">Program Selesai</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white border-t border-slate-200 relative">

            <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10 opacity-30">
                <div class="absolute top-[-10%] right-[-5%] w-96 h-96 bg-blue-50 rounded-full blur-3xl"></div>
                <div class="absolute bottom-[-10%] left-[-5%] w-96 h-96 bg-orange-50 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-6xl mx-auto px-6">

                <div class="text-center mb-20">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-dark mb-4">Lebih dari Sekadar Membantu</h2>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed">
                        Ini bukan cuma soal ngasih waktu, tapi soal apa yang kamu dapetin kembali. Pengalaman, relasi, dan kebahagiaan.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center mb-24">
                    <div class="relative group">
                        <div class="absolute -inset-4 bg-blue-50 rounded-[2.5rem] -z-10 transform rotate-3 transition-transform group-hover:rotate-0"></div>
                        <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Relawan Menyalurkan Bantuan"
                            class="rounded-[2rem] shadow-2xl w-full h-auto object-cover transform transition-transform hover:scale-[1.02]">
                    </div>

                    <div>
                        <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center text-primary text-2xl mb-6 shadow-sm">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-dark mb-4">Rasakan Dampak Nyata</h3>
                        <p class="text-slate-500 text-lg leading-relaxed mb-8">
                            Kamu akan terlibat langsung di lapangan, melihat senyum penerima manfaat, dan jadi saksi bahwa bantuanmu sampai tepat sasaran. Bukan sekadar angka di layar.
                        </p>
                        <a href="{{ route('volunteer.campaigns') }}" class="inline-flex items-center font-bold text-primary hover:text-blue-700 transition group">
                            Lihat program kami <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <div class="order-2 lg:order-1">
                        <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-accent text-2xl mb-6 shadow-sm">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-dark mb-4">Keluarga & Keahlian Baru</h3>
                        <p class="text-slate-500 text-lg leading-relaxed mb-8">
                            Bertemu orang-orang se-frekuensi, bangun jaringan profesional, dan asah <em>soft-skill</em> baru (leadership, komunikasi, manajemen acara) yang gak diajarin di kampus.
                        </p>
                        <a href="#story-and-testimonial" class="inline-flex items-center font-bold text-primary hover:text-blue-700 transition group">
                            Dengar cerita mereka <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>

                    <div class="order-1 lg:order-2 relative group">
                        <div class="absolute -inset-4 bg-orange-50 rounded-[2.5rem] -z-10 transform -rotate-3 transition-transform group-hover:rotate-0"></div>
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                            alt="Komunitas Relawan DonGiv"
                            class="rounded-[2rem] shadow-2xl w-full h-auto object-cover transform transition-transform hover:scale-[1.02]">
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
                                <p class="font-bold text-gray-800 text-lg">Budi Santoso</p>
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
                                <p class="font-bold text-gray-800 text-lg">Aisha Putri</p>
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


        <section class="py-24 bg-slate-50 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full blur-3xl -mr-20 -mt-20 opacity-40 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-orange-100 rounded-full blur-3xl -ml-20 -mb-20 opacity-40 pointer-events-none"></div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-primary text-xs font-bold tracking-wider uppercase mb-4">
                        Peran & Manfaat
                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                        Cari Peran yang Paling 'Kamu Banget'
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Gak semua harus ke lapangan. Kontribusimu bisa dalam banyak bentuk, dan inilah yang akan kamu dapatkan kembali.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="group bg-white p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-blue-100 text-primary rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:scale-110 transition-transform">
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Relawan Lapangan</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Turun langsung menyalurkan bantuan, asesmen kebutuhan, dan melihat senyum penerima manfaat secara langsung.
                            </p>
                        </div>
                    </div>

                    <div class="group bg-white p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-orange-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-orange-100 text-accent rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Tim Kreatif</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Bantu bikin desain visual, video cinematic, dan konten media sosial yang nendang untuk menyebarkan kebaikan.
                            </p>
                        </div>
                    </div>

                    <div class="group bg-white p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-green-50 rounded-full blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm group-hover:scale-110 transition-transform">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Pengajar & Mentor</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Berbagi ilmu dan keahlianmu di program-program edukasi kami untuk memberdayakan sesama.
                            </p>
                        </div>
                    </div>

                    <div class="lg:col-span-3 mt-8 p-8 md:p-12 bg-white rounded-[2.5rem] border border-slate-100 shadow-sm text-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 via-white to-orange-50 opacity-50"></div>
                        <div class="relative z-10 font-medium text-gray-800 text-lg md:text-xl leading-relaxed">
                            <i class="fas fa-gift text-primary mr-2 text-2xl"></i>
                            Dan pastinya: <span class="font-bold text-primary">E-Sertifikat Resmi</span>, jejaring profesional baru, dan <span class="font-bold text-accent">Merchandise Eksklusif</span> untuk setiap kontribusimu!
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="py-24 bg-white">

            <style>
                /* Target spesifik untuk mematikan panah bawaan */
                details>summary {
                    list-style: none !important;
                }

                details>summary::-webkit-details-marker {
                    display: none !important;
                }
            </style>

            <div class="max-w-3xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-4">Sering Ditanyakan</h2>
                    <p class="text-gray-600 text-lg">Masih ragu? Temukan jawabannya di sini.</p>
                </div>

                <div class="space-y-4">
                    <div class="bg-white rounded-2xl border border-slate-200 hover:border-primary/50 transition-colors duration-300 overflow-hidden shadow-sm hover:shadow-md group">
                        <details class="p-6 cursor-pointer group">
                            <summary class="list-none flex justify-between items-center font-bold text-lg text-gray-800 select-none">
                                <span>Apakah saya harus punya keahlian khusus?</span>
                                <span class="ml-4 flex-shrink-0 text-slate-400 transition-transform duration-300 group-open:rotate-180">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </summary>
                            <div class="mt-4 pt-4 border-t border-slate-100 text-gray-600 leading-relaxed animate-fade-in-down">
                                <p>Niat adalah keahlian utamamu! Kami punya banyak peran. Untuk peran teknis (seperti Tim Kreatif/IT), keahlian spesifik akan jadi nilai plus. Tapi untuk Tim Lapangan, yang penting semangat!</p>
                            </div>
                        </details>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 hover:border-primary/50 transition-colors duration-300 overflow-hidden shadow-sm hover:shadow-md group">
                        <details class="p-6 cursor-pointer group">
                            <summary class="list-none flex justify-between items-center font-bold text-lg text-gray-800 select-none">
                                <span>Berapa banyak waktu yang harus diluangkan?</span>
                                <span class="ml-4 flex-shrink-0 text-slate-400 transition-transform duration-300 group-open:rotate-180">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </summary>
                            <div class="mt-4 pt-4 border-t border-slate-100 text-gray-600 leading-relaxed animate-fade-in-down">
                                <p>Fleksibel! Kami ada program berbasis proyek (sekali acara) dan ada yang rutin. Kamu bisa pilih yang paling sesuai dengan jadwalmu. Kami menghargai setiap menit waktumu.</p>
                            </div>
                        </details>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 hover:border-primary/50 transition-colors duration-300 overflow-hidden shadow-sm hover:shadow-md group">
                        <details class="p-6 cursor-pointer group">
                            <summary class="list-none flex justify-between items-center font-bold text-lg text-gray-800 select-none">
                                <span>Apakah saya bisa mendaftar dari luar kota?</span>
                                <span class="ml-4 flex-shrink-0 text-slate-400 transition-transform duration-300 group-open:rotate-180">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            </summary>
                            <div class="mt-4 pt-4 border-t border-slate-100 text-gray-600 leading-relaxed animate-fade-in-down">
                                <p>Sangat bisa! Banyak peran di Tim Kreatif, Dukungan Teknis, atau Penggalang Dana yang bisa dilakukan 100% secara <em>remote</em> (online). Kebaikan gak kenal batas, kan?</p>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-slate-900 border-t border-slate-800 pt-20 pb-10 text-slate-400">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <a href="{{ url('/') }}" class="block mb-6"><img src="{{ asset('images/dongiv-logo.png') }}" alt="DonGiv" class="h-8 brightness-0 invert"></a>
                    <p class="text-sm leading-relaxed mb-6">Platform gotong royong digital untuk menghubungkan jutaan kebaikan. Aman, Mudah, Transparan.</p>
                    <div class="flex gap-4"><a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-primary transition-colors"><i class="fab fa-instagram"></i></a><a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-primary transition-colors"><i class="fab fa-facebook-f"></i></a><a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-primary transition-colors"><i class="fab fa-twitter"></i></a></div>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Program</h4>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#" class="hover:text-primary transition-colors">Donasi Medis</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Bencana Alam</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Pendidikan</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Zakat</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Tentang</h4>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#" class="hover:text-primary transition-colors">Cerita Kami</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Laporan Keuangan</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-6">Legal</h4>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#" class="hover:text-primary transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 text-center flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs">&copy; {{ date('Y') }} DonGiv Indonesia. All rights reserved.</p>
                <p class="text-xs">Dibuat dengan ❤️ untuk Kemanusiaan.</p>
            </div>
        </div>
    </footer>
</body>

</html>