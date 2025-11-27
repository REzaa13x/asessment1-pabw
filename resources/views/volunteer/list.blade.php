<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misi Kebaikan - DonGiv</title>

    <meta name="is-logged-in" content="{{ Auth::check() ? 'true' : 'false' }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
                        primary: '#2563eb',
                        secondary: '#3b82f6',
                        accent: '#f59e0b',
                        dark: '#0f172a',
                        surface: '#f8fafc',
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(0,0,0,0.05)',
                        'glow': '0 0 20px rgba(37, 99, 235, 0.15)',
                    }
                }
            }
        }
    </script>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        body {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        dialog::backdrop {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
        }

        dialog[open] {
            animation: slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- CUSTOM COLOR SWEETALERT2 --- */
        /* 1. Ubah warna lingkaran icon sukses jadi Hijau Request */
        .swal2-icon.swal2-success {
            border-color: #40B56B !important;
            color: #40B56B !important;
        }

        .swal2-icon.swal2-success .swal2-success-ring {
            border-color: rgba(64, 181, 107, 0.3) !important;
        }

        /* 2. Ubah warna garis centang jadi Hijau Request */
        .swal2-icon.swal2-success [class^='swal2-success-line'] {
            background-color: #40B56B !important;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-surface font-sans text-slate-600 antialiased selection:bg-blue-100 selection:text-primary">

    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-blue-100/40 rounded-[100%] blur-3xl opacity-60"></div>
        <div class="absolute bottom-0 right-0 w-[800px] h-[600px] bg-orange-50/40 rounded-[100%] blur-3xl opacity-60"></div>
    </div>

    <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-xl border-b border-slate-100 transition-all">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="{{ route('volunteer') }}" class="flex items-center gap-2 text-slate-500 hover:text-primary transition-colors font-bold text-sm px-4 py-2 rounded-full hover:bg-white hover:shadow-sm">
                <i class="fas fa-arrow-left"></i> <span>Kembali</span>
            </a>

            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/dongiv-logo.png') }}" alt="DonGiv" class="h-8 w-auto hover:scale-105 transition-transform">
            </a>

            <div class="flex items-center gap-3">
                @auth
                <div class="hidden md:flex flex-col items-end mr-2">
                    <span class="text-sm font-bold text-slate-800">{{ explode(' ', Auth::user()->name)[0] }}</span>
                    <span class="text-[10px] text-green-600 bg-green-50 px-2 py-0.5 rounded-full font-bold border border-green-100">Verified User</span>
                </div>
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-extrabold shadow-lg shadow-blue-200 border-2 border-white">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                @else
                <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 hover:text-primary transition mr-2">Masuk</a>
                <a href="{{ route('register') }}" class="bg-primary hover:bg-blue-700 text-white text-sm font-bold px-6 py-2.5 rounded-full transition shadow-lg shadow-blue-200 hover:shadow-blue-300 transform hover:-translate-y-0.5">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="pt-36 pb-24 px-6 max-w-7xl mx-auto min-h-screen">

        <div class="text-center mb-16 relative">
            <div class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-white border border-blue-100 shadow-sm mb-6 animate-bounce" style="animation-duration: 3s;">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-orange-500"></span>
                </span>
                <span class="text-xs font-bold text-slate-600 tracking-wide">350+ Relawan Bergabung Minggu Ini</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 tracking-tight mb-5 leading-tight">
                Aksi Kecil, <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-blue-400">Dampak Besar.</span>
            </h1>
            <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed">
                Bergabunglah dengan ribuan orang baik lainnya. Temukan kampanye sosial dan jadilah alasan seseorang tersenyum hari ini.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($campaigns as $campaign)
            <div
                onclick="openDetailModal(this)"
                data-id="{{ $campaign->id }}"
                data-title="{{ $campaign->title }}"
                data-desc="{{ $campaign->description }}"
                data-image="{{ $campaign->image ? asset('storage/' . $campaign->image) : '' }}"
                data-date="{{ $campaign->created_at->format('d M Y') }}"
                class="group bg-white rounded-[1.5rem] border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-soft flex flex-col h-full overflow-hidden relative">
                <div class="h-52 w-full relative overflow-hidden bg-slate-100">
                    <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : '' }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-slate-50 flex items-center justify-center\'><i class=\'fas fa-image text-slate-300 text-4xl\'></i></div>'">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-80"></div>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-full bg-white/90 backdrop-blur text-[10px] font-extrabold uppercase tracking-wider text-primary shadow-sm">Sosial</span>
                    </div>
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md text-dark">
                            <i class="fas fa-arrow-right -rotate-45"></i>
                        </div>
                    </div>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 mb-3 text-xs font-medium text-slate-400">
                        <i class="far fa-calendar"></i> {{ $campaign->created_at->format('d M Y') }}
                        <span>•</span>
                        <span class="text-green-600 font-bold">Aktif</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 leading-snug group-hover:text-primary transition-colors">
                        {{ $campaign->title }}
                    </h3>
                    <p class="text-slate-500 text-sm line-clamp-2 mb-6 leading-relaxed">
                        {{ $campaign->description }}
                    </p>
                    <div class="mt-auto pt-5 border-t border-slate-50 flex items-center justify-between">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-blue-100 flex items-center justify-center text-[10px] font-bold text-blue-600">AG</div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-orange-100 flex items-center justify-center text-[10px] font-bold text-orange-600">SR</div>
                            <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-100 flex items-center justify-center text-[10px] font-bold text-slate-500">+40</div>
                        </div>
                        <span class="text-sm font-bold text-primary cursor-pointer hover:underline">Gabung</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center bg-white rounded-3xl border border-dashed border-slate-200">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-slate-300 text-3xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800">Belum ada misi tersedia</h3>
                <p class="text-slate-400 text-sm">Silakan cek kembali nanti ya.</p>
            </div>
            @endforelse
        </div>
    </div>


    <dialog id="modalDetail" class="rounded-[2rem] shadow-2xl w-full max-w-3xl p-0 overflow-hidden bg-white m-auto">
        <div class="relative flex flex-col max-h-[90vh]">
            <button onclick="document.getElementById('modalDetail').close()"
                class="absolute top-5 right-5 z-20 w-10 h-10 bg-black/20 hover:bg-black/40 backdrop-blur-md rounded-full flex items-center justify-center text-white transition border border-white/10">
                <i class="fas fa-times"></i>
            </button>

            <div class="h-72 w-full bg-slate-100 shrink-0 relative" id="detailImageContainer"></div>

            <div class="px-8 sm:px-10 py-8 overflow-y-auto no-scrollbar">
                <div class="flex flex-wrap gap-4 mb-6 border-b border-slate-100 pb-6">
                    <div class="flex items-center gap-2 text-slate-600 text-sm"><i class="fas fa-map-marker-alt text-red-500"></i> Indonesia</div>
                    <div class="flex items-center gap-2 text-slate-600 text-sm"><i class="fas fa-calendar-alt text-primary"></i> <span id="detailDate">Date</span></div>
                    <div class="flex items-center gap-2 text-slate-600 text-sm"><i class="fas fa-users text-accent"></i> Terbuka Umum</div>
                </div>

                <h2 class="text-3xl font-extrabold text-slate-900 mb-6 leading-tight" id="detailTitle">Title</h2>
                <div class="prose prose-sm prose-slate max-w-none text-slate-600 leading-relaxed whitespace-pre-line" id="detailDesc"></div>

                <div class="mt-8 bg-blue-50/50 rounded-2xl p-6 border border-blue-100 flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-primary flex items-center justify-center shrink-0"><i class="fas fa-shield-alt text-lg"></i></div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">Aktivitas Terverifikasi</h4>
                        <p class="text-xs text-slate-500 mt-1">Kegiatan ini diawasi langsung oleh tim DonGiv untuk memastikan keamanan.</p>
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-slate-100 bg-white flex justify-between items-center gap-6 shrink-0">
                <div class="hidden sm:block">
                    <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Sisa Kuota</p>
                    <div class="flex items-center gap-2 mt-1">
                        <div class="w-24 h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="bg-accent h-full w-3/4 rounded-full"></div>
                        </div>
                        <span class="text-xs font-bold text-slate-700">Terbatas</span>
                    </div>
                </div>
                <button onclick="proceedToForm()" class="flex-1 sm:flex-none bg-primary hover:bg-blue-700 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-blue-200 transition-all hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    Gabung Aksi Ini <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </dialog>

    <dialog id="modalForm" class="rounded-[2rem] shadow-2xl w-full max-w-lg p-0 backdrop:bg-gray-900/60 m-auto">
        <div class="bg-white relative">
            <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/30">
                <div>
                    <h3 class="font-bold text-xl text-slate-900">Formulir Relawan</h3>
                    <p class="text-xs text-slate-500 mt-1 font-medium">Mari berkontribusi bersama kami</p>
                </div>
                <button onclick="document.getElementById('modalForm').close()" class="w-8 h-8 rounded-full bg-white border border-slate-200 hover:bg-slate-100 flex items-center justify-center transition text-slate-400 hover:text-slate-600"><i class="fas fa-times"></i></button>
            </div>

            <div class="p-8">
                <form id="formDaftar" onsubmit="submitForm(event)" class="space-y-5">
                    @csrf
                    <input type="hidden" name="campaign_id" id="formCampaignId">

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Divisi Pilihan</label>
                        <div class="relative">
                            <select name="role_selected" required class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 font-bold rounded-xl p-4 pr-10 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition cursor-pointer hover:bg-white">
                                <option value="" disabled selected>Pilih peran...</option>
                                <option value="logistik">📦 Logistik & Distribusi</option>
                                <option value="medis">💊 Tim Medis / P3K</option>
                                <option value="acara">🎤 Koordinator Acara</option>
                                <option value="dokumentasi">📸 Dokumentasi & Kreatif</option>
                            </select>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"><i class="fas fa-chevron-down"></i></div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-xl p-1">
                        <div class="border-b border-slate-100 p-1">
                            <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}" required class="w-full p-3 outline-none text-sm font-medium text-slate-700 placeholder-slate-400" placeholder="Nama Lengkap (Sesuai KTP)">
                        </div>
                        <div class="grid grid-cols-2 divide-x divide-slate-100 p-1">
                            <input type="text" name="phone" required class="w-full p-3 outline-none text-sm font-medium text-slate-700 placeholder-slate-400" placeholder="WhatsApp (08xx)">
                            <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" required class="w-full p-3 outline-none text-sm font-medium text-slate-700 placeholder-slate-400" placeholder="Alamat Email">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Motivasi Singkat</label>
                        <textarea name="reason" rows="2" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-sm font-medium focus:ring-2 focus:ring-primary outline-none transition placeholder-slate-400" placeholder="Kenapa kamu ingin bergabung di misi ini?"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-slate-900 hover:bg-black text-white font-bold py-4 rounded-xl shadow-lg mt-2 transition-all active:scale-95 flex justify-center items-center gap-2">
                        Kirim Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </dialog>

    <script>
        let currentCampaignId = null;

        function openDetailModal(element) {
            const id = element.getAttribute('data-id');
            const title = element.getAttribute('data-title');
            const desc = element.getAttribute('data-desc');
            const imgSrc = element.getAttribute('data-image');
            const date = element.getAttribute('data-date');

            currentCampaignId = id;
            document.getElementById('detailTitle').innerText = title;
            document.getElementById('detailDesc').innerText = desc;
            document.getElementById('detailDate').innerText = date;

            const imgContainer = document.getElementById('detailImageContainer');
            if (imgSrc) {
                imgContainer.innerHTML = `<img src="${imgSrc}" class="w-full h-full object-cover"><div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-80"></div>`;
            } else {
                imgContainer.innerHTML = `<div class="w-full h-full bg-slate-100 flex items-center justify-center"><i class="fas fa-image text-slate-300 text-5xl"></i></div>`;
            }
            document.getElementById('modalDetail').showModal();
        }

        function proceedToForm() {
            const isLoggedIn = document.querySelector('meta[name="is-logged-in"]').content === 'true';
            if (!isLoggedIn) {
                if (confirm("Yuk login dulu untuk mendaftar jadi relawan!")) window.location.href = "{{ route('login') }}";
                return;
            }
            document.getElementById('modalDetail').close();
            document.getElementById('formCampaignId').value = currentCampaignId;
            document.getElementById('modalForm').showModal();
        }

        async function submitForm(e) {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const oriHTML = btn.innerHTML;

            btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Memproses...';
            btn.disabled = true;
            btn.classList.add('opacity-70');

            let formData = new FormData(e.target);

            try {
                let response = await fetch("{{ route('volunteer.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'Accept': 'application/json'
                    }
                });
                let result = await response.json();

                if (response.ok) {
                    document.getElementById('modalForm').close();

                    // ALERT SUKSES DENGAN TOMBOL BIRU REQUESTED
                    Swal.fire({
                        icon: 'success',
                        title: 'Permohonan Terkirim',
                        html: `
                            <div class="text-slate-600 text-sm leading-relaxed mt-2">
                                Terima kasih atas inisiatif baik Anda. <br>
                                Data pendaftaran telah kami terima dan akan segera ditinjau oleh tim Admin.
                            </div>
                        `,
                        confirmButtonText: 'Selesai',
                        confirmButtonColor: '#245ADF', // INI DIA WARNANYA!
                        buttonsStyling: false,
                        customClass: {
                            popup: 'rounded-[2rem] shadow-2xl p-6',
                            title: 'text-slate-800 text-xl font-bold font-sans',
                            confirmButton: 'bg-[#245ADF] hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl transition-all shadow-lg mt-4 text-sm'
                        },
                        background: '#ffffff',
                        backdrop: `rgba(15, 23, 42, 0.8)`
                    });

                    e.target.reset();
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Gagal Mengirim',
                        text: result.message || 'Mohon periksa kembali data Anda.',
                        confirmButtonColor: '#f59e0b',
                        customClass: {
                            popup: 'rounded-[2rem] p-6',
                            confirmButton: 'rounded-xl px-6 py-3'
                        }
                    });
                }
            } catch (err) {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Gagal terhubung ke server.',
                    confirmButtonColor: '#ef4444',
                    customClass: {
                        popup: 'rounded-[2rem] p-6',
                        confirmButton: 'rounded-xl px-6 py-3'
                    }
                });
            } finally {
                btn.innerHTML = oriHTML;
                btn.disabled = false;
                btn.classList.remove('opacity-70');
            }
        }
    </script>
</body>

</html>