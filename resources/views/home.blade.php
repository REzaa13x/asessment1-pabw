<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonGiv - Wujudkan Harapan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                },
                extend: {
                    colors: {
                        primary: '#1d4ed8',
                        secondary: '#3b82f6',
                        accent: '#f59e0b',
                        dark: '#0f172a',
                        surface: '#f8fafc',
                    },
                    boxShadow: {
                        'glow': '0 0 40px rgba(37, 99, 235, 0.3)',
                        'card': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                        'float': '0 20px 40px -10px rgba(0, 0, 0, 0.1)',
                    }
                }
            }
        }
    </script>
    <style>
        .hero-overlay {
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.3) 0%, rgba(15, 23, 42, 0.7) 100%);
        }

        .snap-x::-webkit-scrollbar {
            display: none;
        }

        .group:hover .group-hover\:block {
            display: block;
            animation: fadeIn 0.2s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-surface font-sans text-slate-600 antialiased selection:bg-blue-100 selection:text-primary">

    <header class="bg-white/80 backdrop-blur-sm shadow-sm fixed top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/dongiv-logo.png') }}" alt="DonGiv Logo" class="h-8">
                <<<<<<< HEAD
                    </a>
                    <nav class="hidden md:flex items-center space-x-8 font-medium text-gray-700">
                        <a href="#donasi" class="hover:text-primary transition">Donasi</a>
                        <a href="#alur" class="hover:text-primary transition">Transparansi</a>
                        <a href="{{ route('volunteer') }}" class="text-primary font-semibold hover:text-blue-800 transition">Relawan</a>
                        <a href="#testimoni" class="hover:text-primary transition">Kata Mereka</a>
                        <a href="#faq" class="hover:text-primary transition">FAQ</a>
                        =======
        </div>

        <nav class="hidden md:flex items-center space-x-8 font-medium">
            <a href="#donasi" class="text-gray-700 hover:text-primary transition">Donasi</a>
            <a href="#" class="text-gray-700 hover:text-primary transition">Galang Dana</a>

            <a href="#volunteer-campaigns" class="text-gray-700 hover:text-primary transition">Relawan</a>

            <a href="#cara-kerja" class="text-gray-700 hover:text-primary transition">Cara Kerja</a>
            <a href="#" class="text-gray-700 hover:text-primary transition">Tentang Kami</a>
            >>>>>>> d60afdda2274c245aaab03e01243e16bcb42db26
        </nav>
        <div class="flex items-center space-x-3">
            @auth
            <div class="relative group">
                <button class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-800 font-semibold hover:bg-blue-200 transition-colors border border-blue-200">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </button>
                <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2 hidden group-hover:block z-50">
                    <div class="px-4 py-3 border-b border-slate-50 mb-1 bg-slate-50/50">
                        <p class="text-xs text-slate-400 font-medium">Halo, {{ explode(' ', auth()->user()->name)[0] }}!</p>
                    </div>
                    <a href="{{ route('profiles.index') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-600 hover:bg-blue-50 hover:text-primary transition">
                        <i class="fas fa-user-edit w-4"></i> Edit Profil
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition font-medium">
                            <i class="fas fa-sign-out-alt w-4"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
            @else
            <a href="{{ route('login') }}" class="px-6 py-2 rounded-full font-semibold border border-primary text-primary hover:bg-blue-50 transition-all duration-300">Masuk</a>
            <a href="{{ route('register') }}" class="px-6 py-2 rounded-full font-semibold bg-primary text-white hover:bg-blue-800 transition-all duration-300 shadow-md hover:shadow-lg">Daftar</a>
            @endauth
        </div>
        </div>
    </header>

    <main>
        <section class="relative min-h-[85vh] flex items-center pt-20 pb-32">
            <div class="absolute inset-0 overflow-hidden z-0">
                <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover scale-105 origin-center animate-[pulse_10s_ease-in-out_infinite]" alt="Hero">
                <div class="absolute inset-0 hero-overlay"></div>
            </div>
            <div class="relative z-10 w-full px-6">
                <div class="max-w-7xl mx-auto text-center">
                    <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-xs font-bold uppercase tracking-wider mb-6 shadow-lg">
                        <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span> Platform Terverifikasi
                    </span>
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-sm">Satu Aksi Kecil,<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Sejuta Harapan Baru.</span></h1>
                    <p class="text-lg md:text-xl text-slate-200 mb-10 max-w-2xl mx-auto font-medium leading-relaxed">Bergabunglah dengan ekosistem kebaikan terbesar. Transparan, aman, dan langsung berdampak.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#donasi" class="bg-accent hover:bg-amber-500 text-white text-lg font-bold py-4 px-8 rounded-2xl shadow-lg hover:shadow-amber-500/30 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2"><i class="fas fa-heart"></i> Mulai Donasi</a>
                        <a href="{{ route('volunteer') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 text-lg font-bold py-4 px-8 rounded-2xl transition-all flex items-center justify-center gap-2">Jadi Relawan <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="absolute -bottom-16 left-0 w-full z-20 px-6">
                <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-float p-8 md:p-10 flex flex-col md:flex-row justify-around items-center gap-8 border border-slate-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full blur-3xl -mr-16 -mt-16"></div>
                    <div class="text-center relative z-10">
                        <p class="text-4xl md:text-5xl font-extrabold text-primary mb-1">Rp 15M+</p>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wide">Donasi Tersalurkan</p>
                    </div>
                    <div class="hidden md:block w-px h-16 bg-slate-100"></div>
                    <div class="text-center relative z-10">
                        <p class="text-4xl md:text-5xl font-extrabold text-dark mb-1">150rb+</p>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wide">Orang Baik</p>
                    </div>
                    <div class="hidden md:block w-px h-16 bg-slate-100"></div>
                    <div class="text-center relative z-10">
                        <p class="text-4xl md:text-5xl font-extrabold text-accent mb-1">100%</p>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-wide">Transparan</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-12 pb-16 bg-white border-b border-slate-50">
            <div class="max-w-7xl mx-auto px-6">
                <p class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest mb-10">Bekerjasama dengan Lembaga Terpercaya</p>

                <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-8 opacity-70">

                    <div class="flex items-center gap-3 group cursor-default grayscale hover:grayscale-0 transition-all duration-500">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center text-red-600">
                            <i class="fas fa-heartbeat text-xl"></i>
                        </div>
                        <span class="text-lg font-bold text-slate-600 group-hover:text-slate-800">IndoMedika</span>
                    </div>

                    <div class="flex items-center gap-3 group cursor-default grayscale hover:grayscale-0 transition-all duration-500">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                            <i class="fas fa-hands-holding-circle text-xl"></i>
                        </div>
                        <span class="text-lg font-bold text-slate-600 group-hover:text-slate-800">Yayasan Peduli</span>
                    </div>

                    <div class="flex items-center gap-3 group cursor-default grayscale hover:grayscale-0 transition-all duration-500">
                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600">
                            <i class="fas fa-graduation-cap text-xl"></i>
                        </div>
                        <span class="text-lg font-bold text-slate-600 group-hover:text-slate-800">Tunas Bangsa</span>
                    </div>

                    <div class="flex items-center gap-3 group cursor-default grayscale hover:grayscale-0 transition-all duration-500">
                        <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-600">
                            <i class="fas fa-people-carry text-xl"></i>
                        </div>
                        <span class="text-lg font-bold text-slate-600 group-hover:text-slate-800">Aksi Tanggap</span>
                    </div>

                    <div class="flex items-center gap-3 group cursor-default grayscale hover:grayscale-0 transition-all duration-500">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                            <i class="fas fa-mosque text-xl"></i>
                        </div>
                        <span class="text-lg font-bold text-slate-600 group-hover:text-slate-800">Dompet Zakat</span>
                    </div>

                </div>
            </div>
        </section>
        <section class="py-16 bg-surface">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-2xl font-bold text-dark">Salurkan Kebaikan Sesuai Pilihanmu</h2>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white p-6 rounded-2xl text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition cursor-pointer">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-primary mx-auto mb-3"><i class="fas fa-stethoscope text-xl"></i></div>
                        <h4 class="font-bold text-dark">Bantuan Medis</h4>
                    </div>
                    <div class="bg-white p-6 rounded-2xl text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition cursor-pointer">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 mx-auto mb-3"><i class="fas fa-book text-xl"></i></div>
                        <h4 class="font-bold text-dark">Pendidikan</h4>
                    </div>
                    <div class="bg-white p-6 rounded-2xl text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition cursor-pointer">
                        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-accent mx-auto mb-3"><i class="fas fa-house-damage text-xl"></i></div>
                        <h4 class="font-bold text-dark">Bencana Alam</h4>
                    </div>
                    <div class="bg-white p-6 rounded-2xl text-center shadow-sm hover:shadow-md hover:-translate-y-1 transition cursor-pointer">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 mx-auto mb-3"><i class="fas fa-hand-holding-heart text-xl"></i></div>
                        <h4 class="font-bold text-dark">Zakat & Sedekah</h4>
                    </div>
                </div>
            </div>
        </section>

        <section id="donasi" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                    <div>
                        <span class="text-primary font-bold text-sm tracking-wider uppercase mb-2 block">Mendesak</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-dark">Butuh Bantuan Segera</h2>
                        <p class="text-slate-500 mt-2 text-lg">Sedikit bantuanmu sangat berarti bagi mereka.</p>
                    </div>
                    <a href="#" class="text-dark font-bold hover:text-primary transition flex items-center gap-2 group">
                        Lihat Semua <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @if(isset($campaigns) && count($campaigns) > 0)
                    @foreach($campaigns->take(3) as $campaign)

                    {{-- LOGIC HITUNG PERSENTASE (Wajib ditaruh di sini) --}}
                    @php
                    $percentage = 0;
                    if ($campaign->target_amount > 0) {
                    $percentage = min(100, (($campaign->current_amount ?? 0) / $campaign->target_amount) * 100);
                    }
                    @endphp

                    <div class="group bg-white rounded-3xl overflow-hidden shadow-card hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 flex flex-col h-full">
                        <div class="h-56 relative overflow-hidden bg-slate-200">
                            <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=800' }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="{{ $campaign->title }}">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-lg bg-white/95 backdrop-blur text-xs font-extrabold text-primary shadow-sm uppercase tracking-wide">
                                    Verifikasi
                                </span>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-dark mb-2 line-clamp-2 leading-snug group-hover:text-primary transition-colors">
                                {{ $campaign->title }}
                            </h3>
                            <p class="text-sm text-slate-500 mb-5 line-clamp-2">
                                {{ $campaign->description }}
                            </p>

                            <div class="mt-auto">
                                <div class="w-full bg-slate-100 rounded-full h-2 mb-3 overflow-hidden">
                                    <div class="bg-primary h-2 rounded-full" @style(['width: ' . $percentage . ' %'])></div>
                                </div>

                                <div class="flex justify-between text-xs font-bold mb-5">
                                    <div>
                                        <p class="text-slate-400">Terkumpul</p>
                                        <p class="text-primary text-sm">Rp {{ number_format($campaign->current_amount ?? 0, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-slate-400">Target</p>
                                        <p class="text-dark text-sm">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <button class="w-full py-3 rounded-xl bg-white border-2 border-slate-100 text-dark font-bold hover:border-primary hover:bg-primary hover:text-white transition-all flex items-center justify-center gap-2">
                                    Donasi Sekarang
                                </button>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-span-full py-24 text-center bg-white rounded-3xl border border-dashed border-slate-200">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-heart-broken text-slate-300 text-4xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-dark">Belum ada kampanye</h3>
                            <p class="text-slate-500">Nantikan program kebaikan selanjutnya.</p>
                        </div>
                        @endif
                    </div>
                </div>
        </section>
        <section class="py-24 bg-surface border-y border-slate-200 overflow-hidden">
            <div class="max-w-6xl mx-auto px-6">

                <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
                    <div>
                        <h2 class="text-3xl font-extrabold text-dark">Jejak Kebaikan Terbaru ❤️</h2>
                        <p class="text-slate-500 mt-2">Lihat antusiasme orang-orang baik yang tak berhenti berbagi.</p>
                    </div>
                    <div class="flex items-center gap-2 px-4 py-2 bg-white rounded-full border border-slate-200 shadow-sm">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                        </span>
                        <span class="text-xs font-bold text-slate-600 tracking-wide uppercase">Live Update</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-1 bg-primary rounded-3xl p-8 text-white relative overflow-hidden shadow-xl flex flex-col justify-between h-80 lg:h-auto">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none"></div>
                        <div class="relative z-10">
                            <p class="text-blue-100 font-medium mb-2">Total Donasi Hari Ini</p>
                            <h3 class="text-4xl md:text-5xl font-extrabold mb-4">Rp 128<span class="text-blue-200 text-3xl">jt</span></h3>
                            <div class="w-full bg-white/20 rounded-full h-1.5 mb-6">
                                <div class="bg-accent h-1.5 rounded-full" style="width: 70%"></div>
                            </div>
                            <p class="text-sm text-blue-100 leading-relaxed">
                                "Kebaikan sekecil apapun bisa mengubah dunia seseorang. Terima kasih #OrangBaik!"
                            </p>
                        </div>
                        <button onclick="window.location.href='#donasi'" class="mt-6 w-full py-3 bg-white text-primary font-bold rounded-xl hover:bg-blue-50 transition shadow-lg">
                            Ikut Donasi Sekarang
                        </button>
                    </div>

                    <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-100 shadow-card overflow-hidden relative h-[450px]">

                        <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <span>Donatur</span>
                            <span>Jumlah & Waktu</span>
                        </div>

                        <div class="relative h-full overflow-hidden">
                            <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-white to-transparent z-10 pointer-events-none"></div>

                            <div class="animate-scroll-vertical">
                                @php $donors = [
                                ['name' => 'Hamba Allah', 'campaign' => 'Bantu Nurdin', 'amount' => 'Rp 50.000', 'time' => 'Baru saja', 'avatar' => 'HA', 'color' => 'bg-slate-200 text-slate-600'],
                                ['name' => 'Rizky F.', 'campaign' => 'Darurat Sumatra', 'amount' => 'Rp 100.000', 'time' => '2 menit lalu', 'avatar' => 'RF', 'color' => 'bg-blue-100 text-primary'],
                                ['name' => 'Siti Aminah', 'campaign' => 'Sedekah Subuh', 'amount' => 'Rp 25.000', 'time' => '5 menit lalu', 'avatar' => 'SA', 'color' => 'bg-orange-100 text-accent'],
                                ['name' => 'Budi Santoso', 'campaign' => 'Wakaf Masjid', 'amount' => 'Rp 500.000', 'time' => '12 menit lalu', 'avatar' => 'BS', 'color' => 'bg-green-100 text-green-600'],
                                ['name' => 'Anonim', 'campaign' => 'Bantu Nurdin', 'amount' => 'Rp 10.000', 'time' => '15 menit lalu', 'avatar' => 'AN', 'color' => 'bg-purple-100 text-purple-600'],
                                ['name' => 'Citra Lestari', 'campaign' => 'Operasi Jantung', 'amount' => 'Rp 200.000', 'time' => '20 menit lalu', 'avatar' => 'CL', 'color' => 'bg-pink-100 text-pink-600'],
                                ];
                                // Duplikasi array untuk efek infinity loop
                                $allDonors = array_merge($donors, $donors);
                                @endphp

                                @foreach($allDonors as $donor)
                                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-50 hover:bg-slate-50 transition-colors">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full {{ $donor['color'] }} flex items-center justify-center font-bold text-sm shadow-sm">
                                            {{ $donor['avatar'] }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-dark">{{ $donor['name'] }}</p>
                                            <p class="text-xs text-slate-500">Donasi ke <span class="text-primary font-medium">{{ $donor['campaign'] }}</span></p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-green-600">+{{ $donor['amount'] }}</p>
                                        <p class="text-[10px] text-slate-400">{{ $donor['time'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            @keyframes scroll-vertical {
                0% {
                    transform: translateY(0);
                }

                100% {
                    transform: translateY(-50%);
                }
            }

            .animate-scroll-vertical {
                animation: scroll-vertical 20s linear infinite;
            }

            /* Pause animasi saat di-hover user */
            .animate-scroll-vertical:hover {
                animation-play-state: paused;
            }
        </style>

        <section id="cerita" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="bg-dark rounded-[3rem] overflow-hidden relative shadow-2xl">
                    <div class="grid grid-cols-1 lg:grid-cols-2">
                        <div class="p-10 md:p-16 flex flex-col justify-center relative z-10"><span class="text-accent font-bold tracking-widest uppercase text-sm mb-4">Cerita Perubahan</span>
                            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 leading-tight">"Terima kasih, kini anak-anak bisa sekolah dengan nyaman."</h2>
                            <p class="text-slate-300 text-lg mb-8 leading-relaxed">Berkat donasi Anda, renovasi SDN 01 Pelosok telah rampung. 150 siswa kini memiliki atap sekolah yang layak.</p>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-white font-bold text-lg">BU</div>
                                <div>
                                    <p class="text-white font-bold">Bu Utami</p>
                                    <p class="text-slate-400 text-sm">Kepala Sekolah SDN 01</p>
                                </div>
                            </div>
                        </div>
                        <div class="h-64 lg:h-auto relative"><img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=2000&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover" alt="Sekolah">
                            <div class="absolute inset-0 bg-gradient-to-r from-dark via-transparent to-transparent lg:via-dark/50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="alur" class="py-20 bg-surface">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-extrabold text-dark mb-12">Transparansi Dana Donasi</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <div class="hidden md:block absolute top-12 left-20 right-20 h-1 bg-slate-200 -z-10"></div>

                    <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-md transition relative">
                        <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl border-4 border-white shadow-sm">💰</div>
                        <h3 class="text-xl font-bold text-dark mb-2">100% Donasi Masuk</h3>
                        <p class="text-slate-500 text-sm">Seluruh donasi ditampung di rekening yayasan resmi yang terdaftar.</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-md transition relative">
                        <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl border-4 border-white shadow-sm">📨</div>
                        <h3 class="text-xl font-bold text-dark mb-2">Penyaluran & Laporan</h3>
                        <p class="text-slate-500 text-sm">Dana disalurkan sesuai target. Donatur menerima bukti penyaluran via email.</p>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-md transition relative">
                        <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl border-4 border-white shadow-sm">👷</div>
                        <h3 class="text-xl font-bold text-dark mb-2">Operasional 5%</h3>
                        <p class="text-slate-500 text-sm">Maksimal 5% digunakan untuk biaya operasional, verifikasi, dan pengembangan web.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimoni" class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-extrabold text-dark mb-12">Kata #OrangBaik</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-8 bg-slate-50 rounded-3xl text-left relative">
                        <i class="fas fa-quote-left text-4xl text-blue-200 absolute top-6 left-6"></i>
                        <p class="text-slate-600 mb-6 relative z-10 italic">"Platformnya transparan banget. Saya selalu dapet update lewat email setiap donasi saya dipake."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                            <div>
                                <p class="font-bold text-dark text-sm">Rina S.</p>
                                <p class="text-xs text-slate-400">Donatur Rutin</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 bg-slate-50 rounded-3xl text-left relative">
                        <i class="fas fa-quote-left text-4xl text-blue-200 absolute top-6 left-6"></i>
                        <p class="text-slate-600 mb-6 relative z-10 italic">"Jadi relawan lewat DonGiv pengalaman seru! Timnya profesional dan kegiatannya berdampak nyata."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                            <div>
                                <p class="font-bold text-dark text-sm">Dimas A.</p>
                                <p class="text-xs text-slate-400">Relawan Pengajar</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 bg-slate-50 rounded-3xl text-left relative">
                        <i class="fas fa-quote-left text-4xl text-blue-200 absolute top-6 left-6"></i>
                        <p class="text-slate-600 mb-6 relative z-10 italic">"Alhamdulillah, proses galang dananya mudah dan cepat cair saat butuh untuk operasi ayah."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                            <div>
                                <p class="font-bold text-dark text-sm">Fajar K.</p>
                                <p class="text-xs text-slate-400">Penerima Manfaat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="faq" class="py-20 bg-surface">
            <div class="max-w-3xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-dark">Pertanyaan Umum</h2>
                    <p class="text-slate-500 mt-2">Kami menjawab keraguan Anda.</p>
                </div>
                <div class="space-y-4">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                        <details class="group">
                            <summary class="flex justify-between items-center font-bold text-dark cursor-pointer list-none"><span>Apakah donasi saya aman?</span><span class="transition group-open:rotate-180"><i class="fas fa-chevron-down text-slate-400"></i></span></summary>
                            <p class="text-slate-500 mt-4 leading-relaxed text-sm">Tentu, kami menggunakan payment gateway terverifikasi dan diawasi lembaga terkait.</p>
                        </details>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                        <details class="group">
                            <summary class="flex justify-between items-center font-bold text-dark cursor-pointer list-none"><span>Bagaimana cara jadi relawan?</span><span class="transition group-open:rotate-180"><i class="fas fa-chevron-down text-slate-400"></i></span></summary>
                            <p class="text-slate-500 mt-4 leading-relaxed text-sm">Klik menu "Jadi Relawan", pilih kampanye, dan isi formulir pendaftarannya.</p>
                        </details>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white border-t border-slate-100">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-dark mb-6">Siap Membuat Perubahan?</h2>
                <p class="text-slate-500 mb-8 text-lg">Jangan tunggu kaya untuk memberi, jangan tunggu luang untuk peduli.</p>
                <div class="flex justify-center gap-4"><a href="#donasi" class="bg-primary hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg transition-all hover:-translate-y-1">Donasi Sekarang</a><a href="{{ route('volunteer') }}" class="bg-slate-100 hover:bg-slate-200 text-dark font-bold py-3 px-8 rounded-xl transition-all">Jadi Relawan</a></div>
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