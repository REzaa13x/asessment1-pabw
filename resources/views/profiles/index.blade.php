<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil Saya - DonGiv</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        .profile-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .stat-card {
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .section-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .table-row:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }
        .text-gray-800 {
            color: #1f2937;
        }
        .text-gray-600 {
            color: #4b5563;
        }
        .text-gray-700 {
            color: #374151;
        }
        .bg-gradient-to-br.from-white.to-blue-50 {
            background: linear-gradient(to bottom right, #ffffff, #dbeafe);
        }
        .bg-gradient-to-r.from-blue-600.to-blue-700 {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
        }
        .bg-gradient-to-r.from-blue-600.to-blue-700:hover {
            background: linear-gradient(to right, #1d4ed8, #1e40af);
        }
        .bg-gradient-to-r.from-green-50.to-emerald-50 {
            background: linear-gradient(to right, #f0fdf4, #ecfdf5);
        }
        .border-l-4.border-green-500 {
            border-left-color: #22c55e;
        }
        .text-green-700 {
            color: #15803d;
        }
        .bg-gradient-to-r.from-amber-500.to-amber-600 {
            background: linear-gradient(to right, #f59e0b, #d97706);
        }
        .bg-gradient-to-r.from-emerald-500.to-emerald-600 {
            background: linear-gradient(to right, #10b981, #059669);
        }
        .bg-gradient-to-r.from-amber-100.to-amber-200 {
            background: linear-gradient(to right, #fef3c7, #fde68a);
        }
        .bg-gradient-to-r.from-blue-100.to-blue-200 {
            background: linear-gradient(to right, #dbeafe, #bfdbfe);
        }
        .bg-gradient-to-r.from-green-100.to-green-200 {
            background: linear-gradient(to right, #dcfce7, #bbf7d0);
        }
        .bg-gradient-to-r.from-red-100.to-red-200 {
            background: linear-gradient(to right, #fee2e2, #fecaca);
        }
        .text-amber-800 {
            color: #92400e;
        }
        .text-blue-800 {
            color: #1e40af;
        }
        .text-blue-600 {
            color: #2563eb;
        }
        .text-amber-600 {
            color: #d97706;
        }
        .text-amber-700 {
            color: #b45309;
        }
        .text-blue-700 {
            color: #1d4ed8;
        }
        .text-blue-500 {
            color: #3b82f6;
        }
        .text-amber-500 {
            color: #f59e0b;
        }
        .bg-amber-50 {
            background-color: #fffbeb;
        }
        .bg-blue-50 {
            background-color: #eff6ff;
        }
        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .tab-pane {
            display: none;
        }
        .tab-pane.active {
            display: block;
        }
        .notification-item {
            transition: all 0.3s ease;
        }
        .notification-item:hover {
            transform: translateX(5px);
        }
        .text-blue-200 {
            color: #bfdbfe;
        }
        .text-emerald-200 {
            color: #a7f3d0;
        }
        .text-amber-200 {
            color: #fef08a;
        }
        .bg-gradient-to-br.from-blue-600.to-blue-700 {
            background: linear-gradient(to bottom right, #2563eb, #1d4ed8);
        }
        .bg-gradient-to-br.from-emerald-600.to-emerald-700 {
            background: linear-gradient(to bottom right, #059669, #047857);
        }
        .bg-gradient-to-br.from-amber-600.to-amber-700 {
            background: linear-gradient(to bottom right, #d97706, #b45309);
        }
        .border-blue-500\/30 {
            border-color: rgba(37, 99, 235, 0.3);
        }
        .border-emerald-500\/30 {
            border-color: rgba(16, 185, 129, 0.3);
        }
        .border-amber-500\/30 {
            border-color: rgba(217, 119, 6, 0.3);
        }
        .bg-blue-500\/30 {
            background-color: rgba(37, 99, 235, 0.3);
        }
        .bg-emerald-500\/30 {
            background-color: rgba(16, 185, 129, 0.3);
        }
        .bg-amber-500\/30 {
            background-color: rgba(217, 119, 6, 0.3);
        }
        @media (max-width: 768px) {
            .tab-content {
                padding: 0.5rem;
            }
            .section-card {
                padding: 1rem;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-cyan-50 text-gray-800">
    <!-- Header -->
    <header class="bg-white/80 backdrop-blur-sm shadow-sm fixed top-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/dongiv-logo.png') }}" alt="DonGiv Logo" class="h-8">
            </div>

            <nav class="hidden md:flex items-center space-x-8 font-medium">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary transition">Beranda</a>
                <a href="{{ route('campaigns.all') }}" class="text-gray-700 hover:text-primary transition">Donasi</a>
                <a href="#" class="text-gray-700 hover:text-primary transition">Galang Dana</a>
                <a href="#" class="text-gray-700 hover:text-primary transition">Relawan</a>
                <a href="#" class="text-gray-700 hover:text-primary transition">Cara Kerja</a>
                <a href="#" class="text-gray-700 hover:text-primary transition">Tentang Kami</a>
            </nav>
            <div class="flex items-center space-x-3">
                <!-- Search bar -->
                <div class="hidden md:flex items-center">
                    <input type="text" placeholder="Cari sesuatu..." class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <button class="ml-2 bg-primary text-white px-4 py-2 rounded-full hover:bg-blue-800">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

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

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-cyan-50 pt-24 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Profil Saya</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kelola informasi akun dan pantau riwayat donasi Anda untuk berkontribusi lebih pada kegiatan sosial</p>
            </div>

            @if(session('success'))
                <div class="mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-xl shadow-md">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mr-4">
                            <i class="fas fa-check-circle text-2xl mt-1 text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-bold text-lg">Sukses!</p>
                            <p class="">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Profile Overview Card -->
            <div class="profile-card bg-gradient-to-br from-white to-blue-50 rounded-3xl shadow-2xl p-8 mb-8 border border-gray-200/50 backdrop-blur-sm">
                <div class="flex flex-col md:flex-row items-center justify-between mb-8">
                    <div class="flex items-center mb-6 md:mb-0">
                        @if($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}"
                                 alt="Profile Photo"
                                 class="w-20 h-20 rounded-full object-cover border-4 border-blue-200 shadow-lg mr-4">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center text-white text-2xl font-bold border-4 border-blue-200 shadow-lg mr-4">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                        @endif
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            @if($user->phone)
                                <p class="text-gray-500 text-sm flex items-center mt-1"><i class="fas fa-phone mr-1"></i> {{ $user->phone }}</p>
                            @endif
                            @if($user->birth_date)
                                <p class="text-gray-500 text-sm flex items-center mt-1"><i class="fas fa-birthday-cake mr-1"></i> {{ $user->birth_date->format('d M Y') }}</p>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('profiles.edit') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-edit mr-2"></i>Edit Profil
                    </a>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="stat-card bg-gradient-to-br from-blue-600 to-blue-700 p-6 rounded-2xl shadow-lg border border-blue-500/30 text-center text-white transform transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl">
                        <div class="flex items-center justify-center mb-3">
                            <div class="bg-blue-500/30 p-3 rounded-full">
                                <i class="fas fa-hand-holding-heart text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold mb-1">Rp{{ number_format($totalDonation, 0, ',', '.') }}</div>
                            <div class="text-blue-200 text-sm">Total Donasi</div>
                        </div>
                    </div>
                    <div class="stat-card bg-gradient-to-br from-emerald-600 to-emerald-700 p-6 rounded-2xl shadow-lg border border-emerald-500/30 text-center text-white transform transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl">
                        <div class="flex items-center justify-center mb-3">
                            <div class="bg-emerald-500/30 p-3 rounded-full">
                                <i class="fas fa-receipt text-2xl"></i>
                            </div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold mb-1">{{ $totalTransactions }}</div>
                            <div class="text-emerald-200 text-sm">Total Campaign</div>
                        </div>
                    </div>
                    <div class="stat-card bg-gradient-to-br from-amber-600 to-amber-700 p-6 rounded-2xl shadow-lg border border-amber-500/30 text-center text-white transform transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-500/20 to-amber-600/20"></div>
                        <div class="relative z-10">
                            <div class="flex items-center justify-center mb-3">
                                <div class="bg-amber-500/30 p-3 rounded-full relative">
                                    <i class="fas fa-coins text-2xl"></i>
                                    <div class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-bolt text-[10px]"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="text-3xl font-bold mb-1 flex items-center justify-center">
                                    {{ $user->coins }}
                                    <span class="ml-2 text-lg">🪙</span>
                                </div>
                                <div class="text-amber-200 text-sm">Koin</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Navigation -->
                <div class="border-b border-gray-200 mb-8">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="profileTabs" data-tabs-toggle="#profileTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-flex items-center text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent border-b-2 p-4 rounded-t-lg active"
                                    id="profile-tab"
                                    data-tabs-target="#profile"
                                    type="button"
                                    role="tab"
                                    aria-controls="profile"
                                    aria-selected="true">
                                <i class="fas fa-user mr-2"></i>Profil
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-flex items-center text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent border-b-2 p-4 rounded-t-lg"
                                    id="donation-history-tab"
                                    data-tabs-target="#donation-history"
                                    type="button"
                                    role="tab"
                                    aria-controls="donation-history"
                                    aria-selected="false">
                                <i class="fas fa-history mr-2"></i>Riwayat Donasi
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button class="inline-flex items-center text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent border-b-2 p-4 rounded-t-lg"
                                    id="notifications-tab"
                                    data-tabs-target="#notifications"
                                    type="button"
                                    role="tab"
                                    aria-controls="notifications"
                                    aria-selected="false">
                                <i class="fas fa-bell mr-2"></i>Notifikasi
                            </button>
                        </li>
                        <li role="presentation">
                            <button class="inline-flex items-center text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent border-b-2 p-4 rounded-t-lg"
                                    id="settings-tab"
                                    data-tabs-target="#settings"
                                    type="button"
                                    role="tab"
                                    aria-controls="settings"
                                    aria-selected="false">
                                <i class="fas fa-cog mr-2"></i>Pengaturan
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div id="profileTabContent">
                    <!-- Profile Tab -->
                    <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Organized Content Sections -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Coin History Section -->
                            <div class="section-card bg-gradient-to-br from-amber-50 to-amber-100 rounded-2xl p-6 border border-amber-200/50 shadow-sm">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-2xl font-bold text-amber-800 flex items-center">
                                        <i class="fas fa-coins mr-3 text-amber-600"></i>
                                        Riwayat Koin
                                    </h3>
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-star text-amber-500"></i>
                                        <span class="text-amber-600 font-medium">Kumpulkan koin!</span>
                                    </div>
                                </div>

                                @php
                                    $recentCoinHistories = $user->coinHistories()->orderBy('created_at', 'desc')->limit(5)->get();
                                @endphp

                                @if($recentCoinHistories->count() > 0)
                                    <div class="overflow-hidden rounded-xl border border-amber-200/50 shadow-sm">
                                        <table class="min-w-full bg-white">
                                            <thead class="bg-gradient-to-r from-amber-100 to-amber-200">
                                                <tr>
                                                    <th class="py-3 px-4 text-left text-xs font-bold text-amber-700 uppercase tracking-wider border-b border-amber-200">Tanggal</th>
                                                    <th class="py-3 px-4 text-left text-xs font-bold text-amber-700 uppercase tracking-wider border-b border-amber-200">Aktivitas</th>
                                                    <th class="py-3 px-4 text-left text-xs font-bold text-amber-700 uppercase tracking-wider border-b border-amber-200">Jumlah</th>
                                                    <th class="py-3 px-4 text-left text-xs font-bold text-amber-700 uppercase tracking-wider border-b border-amber-200">Tipe</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-amber-100">
                                                @foreach($recentCoinHistories as $coinHistory)
                                                    <tr class="table-row hover:bg-amber-50 transition-colors duration-200">
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                                            <div class="flex items-center">
                                                                <i class="fas fa-calendar-day mr-2 text-amber-500"></i>
                                                                <span>{{ $coinHistory->created_at->format('d M Y') }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-700">
                                                            <div class="flex items-center">
                                                                <i class="fas fa-lightbulb mr-2 text-amber-600"></i>
                                                                {{ ucfirst(str_replace('_', ' ', $coinHistory->reason)) }}
                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm font-bold">
                                                            <div class="flex items-center">
                                                                @if($coinHistory->transaction_type == 'earned')
                                                                    <i class="fas fa-plus text-green-500 mr-1"></i>
                                                                    <span class="text-green-600">+{{ $coinHistory->amount }}</span>
                                                                @else
                                                                    <i class="fas fa-minus text-red-500 mr-1"></i>
                                                                    <span class="text-red-600">-{{ $coinHistory->amount }}</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm">
                                                            @if($coinHistory->transaction_type == 'earned')
                                                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-green-100 to-green-200 text-green-800 text-xs font-medium">
                                                                    <i class="fas fa-trophy mr-1 text-xs"></i> Earned
                                                                </span>
                                                            @else
                                                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-red-100 to-red-200 text-red-800 text-xs font-medium">
                                                                    <i class="fas fa-shopping-cart mr-1 text-xs"></i> Spent
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-8 bg-white rounded-xl border border-amber-200">
                                        <i class="fas fa-coins text-5xl text-amber-300 mb-4"></i>
                                        <h4 class="text-lg font-bold text-amber-800 mb-2">Belum ada riwayat koin</h4>
                                        <p class="text-amber-600 text-sm">Donasi untuk mulai mengumpulkan koin</p>
                                        <div class="flex items-center justify-center mt-3 space-x-2">
                                            <span class="text-xl">🪙</span>
                                            <span class="text-amber-700 text-sm font-medium">1 koin per Rp10.000 donasi!</span>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Recent Transactions -->
                            <div class="section-card bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200/50 shadow-sm">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-2xl font-bold text-blue-800 flex items-center">
                                        <i class="fas fa-history mr-3 text-blue-600"></i>
                                        Riwayat Donasi
                                    </h3>
                                    <a href="{{ route('profiles.transactions') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 px-4 rounded-lg transition-all duration-300 text-sm flex items-center">
                                        <span>Lihat Semua</span>
                                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                    </a>
                                </div>

                                @if($recentTransactions->count() > 0)
                                    <div class="overflow-hidden rounded-xl border border-blue-200/50 shadow-sm">
                                        <table class="min-w-full bg-white">
                                            <thead class="bg-gradient-to-r from-blue-100 to-blue-200">
                                                <tr>
                                                    <th class="py-3 px-4 text-left text-xs font-bold text-blue-700 uppercase tracking-wider border-b border-blue-200">Tanggal</th>
                                                    <th class="py-3 px-4 text-left text-xs font-bold text-blue-700 uppercase tracking-wider border-b border-blue-200">Nominal</th>
                                                    <th class="py-3 px-4 text-left text-xs font-bold text-blue-700 uppercase tracking-wider border-b border-blue-200">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-blue-100">
                                                @foreach($recentTransactions as $transaction)
                                                    <tr class="table-row hover:bg-blue-50 transition-colors duration-200">
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                                            <div class="flex items-center">
                                                                <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                                                <span>{{ $transaction->created_at->format('d M Y') }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                            <div class="flex items-center">
                                                                <i class="fas fa-money-bill-wave mr-2 text-green-500"></i>
                                                                Rp{{ number_format($transaction->amount, 0, ',', '.') }}
                                                            </div>
                                                        </td>
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm">
                                                            @if($transaction->status === 'VERIFIED')
                                                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-green-100 to-green-200 text-green-800 text-xs font-medium">
                                                                    <i class="fas fa-check-circle mr-1 text-xs"></i> Paid
                                                                </span>
                                                            @elseif($transaction->status === 'PENDING_VERIFICATION')
                                                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800 text-xs font-medium">
                                                                    <i class="fas fa-clock mr-1 text-xs"></i> Waiting
                                                                </span>
                                                            @elseif($transaction->status === 'AWAITING_TRANSFER')
                                                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 text-xs font-medium">
                                                                    <i class="fas fa-hourglass-half mr-1 text-xs"></i> Pending
                                                                </span>
                                                            @else
                                                                <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-red-100 to-red-200 text-red-800 text-xs font-medium">
                                                                    <i class="fas fa-times-circle mr-1 text-xs"></i> Rejected
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-8 bg-white rounded-xl border border-blue-200">
                                        <i class="fas fa-receipt text-5xl text-blue-300 mb-4"></i>
                                        <h4 class="text-lg font-bold text-blue-800 mb-2">Belum ada riwayat donasi</h4>
                                        <p class="text-blue-600 text-sm">Mulai berkontribusi dalam kegiatan sosial</p>
                                        <a href="{{ route('home') }}" class="inline-block mt-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 px-4 rounded-lg transition-all duration-300 text-sm">
                                            <i class="fas fa-list mr-1 text-xs"></i>Lihat Kampanye
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Donation History Tab -->
                    <div class="tab-pane" id="donation-history" role="tabpanel" aria-labelledby="donation-history-tab">
                        <div class="section-card bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200/50 shadow-sm">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-blue-800 flex items-center">
                                    <i class="fas fa-history mr-3 text-blue-600"></i>
                                    Seluruh Riwayat Donasi
                                </h3>
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                    {{ $totalTransactions }} Donasi
                                </span>
                            </div>

                            @if($recentTransactions->count() > 0)
                                <div class="overflow-hidden rounded-xl border border-blue-200/50 shadow-sm">
                                    <table class="min-w-full bg-white">
                                        <thead class="bg-gradient-to-r from-blue-100 to-blue-200">
                                            <tr>
                                                <th class="py-3 px-4 text-left text-xs font-bold text-blue-700 uppercase tracking-wider border-b border-blue-200">Tanggal</th>
                                                <th class="py-3 px-4 text-left text-xs font-bold text-blue-700 uppercase tracking-wider border-b border-blue-200">Kampanye</th>
                                                <th class="py-3 px-4 text-left text-xs font-bold text-blue-700 uppercase tracking-wider border-b border-blue-200">Nominal</th>
                                                <th class="py-3 px-4 text-left text-xs font-bold text-blue-700 uppercase tracking-wider border-b border-blue-200">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-blue-100">
                                            @foreach($recentTransactions as $transaction)
                                                <tr class="table-row hover:bg-blue-50 transition-colors duration-200">
                                                    <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                                            <span>{{ $transaction->created_at->format('d M Y') }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-4 text-sm text-gray-700">
                                                        {{ $transaction->campaign->title ?? 'Kampanye Tidak Ditemukan' }}
                                                    </td>
                                                    <td class="py-3 px-4 whitespace-nowrap text-sm font-bold text-gray-900">
                                                        <div class="flex items-center">
                                                            <i class="fas fa-money-bill-wave mr-2 text-green-500"></i>
                                                            Rp{{ number_format($transaction->amount, 0, ',', '.') }}
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-4 whitespace-nowrap text-sm">
                                                        @if($transaction->status === 'VERIFIED')
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-green-100 to-green-200 text-green-800 text-xs font-medium">
                                                                <i class="fas fa-check-circle mr-1 text-xs"></i> Paid
                                                            </span>
                                                        @elseif($transaction->status === 'PENDING_VERIFICATION')
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800 text-xs font-medium">
                                                                <i class="fas fa-clock mr-1 text-xs"></i> Waiting
                                                            </span>
                                                        @elseif($transaction->status === 'AWAITING_TRANSFER')
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 text-xs font-medium">
                                                                <i class="fas fa-hourglass-half mr-1 text-xs"></i> Pending
                                                            </span>
                                                        @else
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-gradient-to-r from-red-100 to-red-200 text-red-800 text-xs font-medium">
                                                                <i class="fas fa-times-circle mr-1 text-xs"></i> Rejected
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-12 bg-white rounded-xl border border-blue-200">
                                    <i class="fas fa-receipt text-6xl text-blue-300 mb-6"></i>
                                    <h4 class="text-xl font-bold text-blue-800 mb-3">Belum ada riwayat donasi</h4>
                                    <p class="text-blue-600 mb-4">Mulai berkontribusi dalam kegiatan sosial untuk melihat riwayat donasi Anda.</p>
                                    <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300">
                                        <i class="fas fa-heart mr-2"></i>Donasi Sekarang
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div class="tab-pane" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                        <div class="section-card bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200/50 shadow-sm">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-purple-800 flex items-center">
                                    <i class="fas fa-bell mr-3 text-purple-600"></i>
                                    Notifikasi
                                </h3>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                                    8 Tersisa
                                </span>
                            </div>

                            <!-- Notifications List -->
                            <div class="space-y-4">
                                <div class="notification-item bg-white p-4 rounded-xl shadow-sm border border-purple-100 hover:shadow-md transition-shadow">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="font-bold text-gray-800">Donasi Berhasil</h4>
                                            <p class="text-gray-600 text-sm">Donasi sebesar Rp50.000 untuk kampanye "Bantuan Bencana Alam" telah terverifikasi.</p>
                                            <p class="text-gray-500 text-xs mt-1">2 jam yang lalu</p>
                                        </div>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-medium">
                                            Baru
                                        </span>
                                    </div>
                                </div>

                                <div class="notification-item bg-white p-4 rounded-xl shadow-sm border border-purple-100 hover:shadow-md transition-shadow">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                <i class="fas fa-star text-blue-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="font-bold text-gray-800">Koin Diperoleh</h4>
                                            <p class="text-gray-600 text-sm">Anda mendapatkan 5 koin karena telah menyelesaikan tugas harian.</p>
                                            <p class="text-gray-500 text-xs mt-1">1 hari yang lalu</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification-item bg-white p-4 rounded-xl shadow-sm border border-purple-100 hover:shadow-md transition-shadow">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                                <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="font-bold text-gray-800">Pengingat Donasi</h4>
                                            <p class="text-gray-600 text-sm">Donasi bulanan Anda untuk kampanye "Pendidikan Anak" segera jatuh tempo.</p>
                                            <p class="text-gray-500 text-xs mt-1">2 hari yang lalu</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification-item bg-white p-4 rounded-xl shadow-sm border border-purple-100 hover:shadow-md transition-shadow">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                                <i class="fas fa-info-circle text-red-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="font-bold text-gray-800">Pembaruan Kampanye</h4>
                                            <p class="text-gray-600 text-sm">Kampanye "Bantuan Bencana Alam" telah mencapai 75% dari target donasi.</p>
                                            <p class="text-gray-500 text-xs mt-1">3 hari yang lalu</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="notification-item bg-white p-4 rounded-xl shadow-sm border border-purple-100 hover:shadow-md transition-shadow">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 mt-1">
                                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <i class="fas fa-gift text-indigo-600"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="font-bold text-gray-800">Promo Khusus</h4>
                                            <p class="text-gray-600 text-sm">Nikmati penggandaan koin hingga 2x lipat selama akhir pekan ini.</p>
                                            <p class="text-gray-500 text-xs mt-1">4 hari yang lalu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 text-center">
                                <button class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-medium py-2 px-6 rounded-lg transition-all duration-300">
                                    <i class="fas fa-sync mr-2"></i>Muat Lebih Banyak
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="section-card bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border border-gray-200/50 shadow-sm">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                                    <i class="fas fa-cog mr-3 text-gray-600"></i>
                                    Pengaturan Akun
                                </h3>
                            </div>

                            <!-- Personal Information Settings -->
                            <div class="mb-8">
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-user mr-2 text-blue-600"></i>
                                    Informasi Pribadi
                                </h4>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                        <div class="bg-white border border-gray-300 rounded-xl p-3">
                                            <span>{{ $user->name }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <div class="bg-white border border-gray-300 rounded-xl p-3">
                                            <span>{{ $user->email }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                        <div class="bg-white border border-gray-300 rounded-xl p-3">
                                            <span>{{ $user->phone ?? 'Belum diatur' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                                        <div class="bg-white border border-gray-300 rounded-xl p-3">
                                            <span>{{ $user->birth_date ? $user->birth_date->format('d M Y') : 'Belum diatur' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('profiles.edit') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 px-4 rounded-lg transition-all duration-300">
                                        <i class="fas fa-edit mr-2"></i>Edit Informasi
                                    </a>
                                </div>
                            </div>

                            <!-- Account Security -->
                            <div class="mb-8">
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-shield-alt mr-2 text-red-600"></i>
                                    Keamanan Akun
                                </h4>

                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-gray-200">
                                        <div>
                                            <h5 class="font-medium text-gray-800">Kata Sandi</h5>
                                            <p class="text-sm text-gray-600">Ubah kata sandi akun Anda</p>
                                        </div>
                                        <button class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 px-4 rounded-lg text-sm transition-all duration-300">
                                            Ganti
                                        </button>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-gray-200">
                                        <div>
                                            <h5 class="font-medium text-gray-800">Verifikasi Dua Faktor</h5>
                                            <p class="text-sm text-gray-600">Aktifkan keamanan tambahan</p>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="mr-4 text-green-600 text-sm">Aktif</span>
                                            <button class="bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white font-medium py-1 px-3 rounded-lg text-sm transition-all duration-300">
                                                Matikan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notification Settings -->
                            <div class="mb-8">
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-bell mr-2 text-purple-600"></i>
                                    Pengaturan Notifikasi
                                </h4>

                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-gray-200">
                                        <div>
                                            <h5 class="font-medium text-gray-800">Email</h5>
                                            <p class="text-sm text-gray-600">Terima pemberitahuan melalui email</p>
                                        </div>
                                        <div class="relative inline-block w-12 h-6">
                                            <input type="checkbox" class="opacity-0 w-0 h-0 peer" checked>
                                            <label class="absolute cursor-pointer top-0 left-0 right-0 bottom-0 bg-gray-300 rounded-full transition-all peer-checked:bg-blue-600"></label>
                                            <span class="absolute h-4 w-4 bg-white rounded-full left-1 top-1 transition-all peer-checked:left-7"></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-gray-200">
                                        <div>
                                            <h5 class="font-medium text-gray-800">Pemberitahuan Aplikasi</h5>
                                            <p class="text-sm text-gray-600">Terima pemberitahuan di aplikasi</p>
                                        </div>
                                        <div class="relative inline-block w-12 h-6">
                                            <input type="checkbox" class="opacity-0 w-0 h-0 peer" checked>
                                            <label class="absolute cursor-pointer top-0 left-0 right-0 bottom-0 bg-blue-600 rounded-full transition-all peer-checked:bg-blue-600"></label>
                                            <span class="absolute h-4 w-4 bg-white rounded-full left-7 top-1 transition-all peer-checked:left-7"></span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-white rounded-xl border border-gray-200">
                                        <div>
                                            <h5 class="font-medium text-gray-800">Donasi Diperbarui</h5>
                                            <p class="text-sm text-gray-600">Donasi yang Anda dukung diperbarui</p>
                                        </div>
                                        <div class="relative inline-block w-12 h-6">
                                            <input type="checkbox" class="opacity-0 w-0 h-0 peer" checked>
                                            <label class="absolute cursor-pointer top-0 left-0 right-0 bottom-0 bg-blue-600 rounded-full transition-all peer-checked:bg-blue-600"></label>
                                            <span class="absolute h-4 w-4 bg-white rounded-full left-7 top-1 transition-all peer-checked:left-7"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Danger Zone -->
                            <div>
                                <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                                    <i class="fas fa-exclamation-triangle mr-2 text-red-600"></i>
                                    Zona Bahaya
                                </h4>

                                <div class="p-4 bg-red-50 rounded-xl border border-red-200">
                                    <h5 class="font-medium text-red-800 mb-2">Hapus Akun</h5>
                                    <p class="text-sm text-red-600 mb-3">Tindakan ini akan menghapus akun Anda secara permanen beserta semua data pribadi dan riwayat donasi.</p>
                                    <button class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium py-2 px-4 rounded-lg text-sm transition-all duration-300">
                                        <i class="fas fa-trash mr-2"></i>Hapus Akun Saya
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

            // Tab functionality
            const tabButtons = document.querySelectorAll('[role="tab"]');
            const tabPanels = document.querySelectorAll('[role="tabpanel"]');

            tabButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active classes from all buttons and panels
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.remove('text-gray-700');
                        btn.classList.add('text-gray-500');
                    });

                    tabPanels.forEach(panel => {
                        panel.classList.remove('active');
                    });

                    // Add active classes to clicked button and corresponding panel
                    this.classList.add('active', 'text-gray-700');
                    this.classList.remove('text-gray-500');

                    const targetId = this.getAttribute('data-tabs-target').substring(1);
                    const targetPanel = document.getElementById(targetId);
                    targetPanel.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>