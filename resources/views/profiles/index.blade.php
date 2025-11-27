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
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-3xl shadow-2xl p-8 mb-8 border border-gray-200/50 backdrop-blur-sm">
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
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-2xl shadow-xl border border-blue-500/30 backdrop-blur-sm transform transition-transform duration-300 hover:scale-[1.02] hover:shadow-2xl">
                        <div class="flex items-center justify-center mb-3">
                            <div class="bg-blue-500/20 p-3 rounded-full">
                                <i class="fas fa-hand-holding-heart text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">Rp{{ number_format($totalDonation, 0, ',', '.') }}</div>
                            <div class="text-blue-200 text-sm">Total Donasi</div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-600 to-emerald-800 p-6 rounded-2xl shadow-xl border border-emerald-500/30 backdrop-blur-sm transform transition-transform duration-300 hover:scale-[1.02] hover:shadow-2xl">
                        <div class="flex items-center justify-center mb-3">
                            <div class="bg-emerald-500/20 p-3 rounded-full">
                                <i class="fas fa-receipt text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">{{ $totalTransactions }}</div>
                            <div class="text-emerald-200 text-sm">Transaksi</div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-amber-500 to-amber-700 p-6 rounded-2xl shadow-xl border border-amber-500/30 backdrop-blur-sm transform transition-transform duration-300 hover:scale-[1.02] hover:shadow-2xl">
                        <div class="flex items-center justify-center mb-3">
                            <div class="bg-amber-500/20 p-3 rounded-full">
                                <i class="fas fa-coins text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">{{ $user->coins }}</div>
                            <div class="text-amber-200 text-sm">Koin</div>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-history mr-3 text-blue-600"></i>
                            Riwayat Donasi Terbaru
                        </h3>
                        <a href="{{ route('profiles.transactions') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center">
                            <span>Lihat Semua</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>

                    @if($recentTransactions->count() > 0)
                        <div class="overflow-x-auto rounded-xl border border-gray-200/50">
                            <table class="min-w-full bg-white rounded-xl overflow-hidden">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="py-4 px-6 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">Tanggal</th>
                                        <th class="py-4 px-6 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">Nominal</th>
                                        <th class="py-4 px-6 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">Metode</th>
                                        <th class="py-4 px-6 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200/30">
                                    @foreach($recentTransactions as $transaction)
                                        <tr class="hover:bg-gray-50/50 transition-all duration-200 border-b border-gray-100/50">
                                            <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-900 font-medium">
                                                <div class="flex items-center">
                                                    <i class="fas fa-calendar mr-2 text-blue-500"></i>
                                                    <span>{{ $transaction->created_at->format('d M Y') }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 px-6 whitespace-nowrap text-sm font-bold text-gray-900">
                                                <div class="flex items-center">
                                                    <i class="fas fa-money-bill-wave mr-2 text-green-500"></i>
                                                    Rp{{ number_format($transaction->amount, 0, ',', '.') }}
                                                </div>
                                            </td>
                                            <td class="py-4 px-6 whitespace-nowrap text-sm">
                                                <div class="flex items-center">
                                                    @if($transaction->payment_method == 'bank_transfer')
                                                        <div class="flex items-center px-3 py-1 rounded-full bg-blue-100/80 text-blue-800 text-xs font-medium">
                                                            <i class="fas fa-university mr-2"></i> Bank
                                                        </div>
                                                    @elseif($transaction->payment_method == 'e_wallet')
                                                        <div class="flex items-center px-3 py-1 rounded-full bg-green-100/80 text-green-800 text-xs font-medium">
                                                            <i class="fab fa-google-pay mr-2"></i> e-Wallet
                                                        </div>
                                                    @elseif($transaction->payment_method == 'qris')
                                                        <div class="flex items-center px-3 py-1 rounded-full bg-purple-100/80 text-purple-800 text-xs font-medium">
                                                            <i class="fas fa-qrcode mr-2"></i> QRIS
                                                        </div>
                                                    @else
                                                        <div class="flex items-center px-3 py-1 rounded-full bg-gray-100/80 text-gray-800 text-xs font-medium">
                                                            <i class="fas fa-wallet mr-2"></i> {{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="py-4 px-6 whitespace-nowrap text-sm">
                                                @if($transaction->status === 'VERIFIED')
                                                    <div class="flex items-center px-3 py-1 rounded-full bg-green-100/80 text-green-800 text-xs font-medium">
                                                        <i class="fas fa-check-circle mr-2"></i> Paid
                                                    </div>
                                                @elseif($transaction->status === 'PENDING_VERIFICATION')
                                                    <div class="flex items-center px-3 py-1 rounded-full bg-yellow-100/80 text-yellow-800 text-xs font-medium">
                                                        <i class="fas fa-clock mr-2"></i> Waiting
                                                    </div>
                                                @elseif($transaction->status === 'AWAITING_TRANSFER')
                                                    <div class="flex items-center px-3 py-1 rounded-full bg-blue-100/80 text-blue-800 text-xs font-medium">
                                                        <i class="fas fa-hourglass-half mr-2"></i> Pending
                                                    </div>
                                                @else
                                                    <div class="flex items-center px-3 py-1 rounded-full bg-red-100/80 text-red-800 text-xs font-medium">
                                                        <i class="fas fa-times-circle mr-2"></i> Rejected
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl">
                            <i class="fas fa-receipt text-6xl text-gray-300 mb-4"></i>
                            <h4 class="text-xl font-bold text-gray-800 mb-2">Belum ada riwayat donasi</h4>
                            <p class="text-gray-600 mb-6">Mulai berkontribusi dalam kegiatan sosial dengan berdonasi</p>
                            <a href="{{ route('home') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-list mr-2"></i>Lihat Semua Kampanye
                            </a>
                        </div>
                    @endif
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
</body>
</html>