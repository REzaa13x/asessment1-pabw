<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - DonGiv</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1d4ed8', // biru utama
                        secondary: '#3b82f6', // biru lebih muda
                        accent: '#f59e0b', // warna aksen
                        softblue: '#f0f5ff', // background lebih soft
                        softblue2: '#e0f2fe',
                        softblue3: '#bae6fd',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #dbeafe 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }
        .card {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.05);
        }
        .sidebar {
            background: linear-gradient(180deg, #1d4ed8 0%, #1e40af 100%);
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
        }
        .nav-item {
            transition: all 0.3s ease;
            border-radius: 0.75rem;
        }
        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }
        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.25);
        }
        .stat-card {
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
            z-index: 0;
        }
        .stat-card .content {
            position: relative;
            z-index: 1;
        }
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
        .glow {
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
        }
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            background-color: #e2e8f0;
        }
        .progress-fill {
            height: 100%;
            transition: width 1s ease-in-out;
        }
    </style>
</head>

<body class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="sidebar text-white w-64 min-h-screen p-6 sticky top-0">
        <div class="mb-10">
            <div class="flex items-center space-x-3 mb-8">
                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-heart text-white text-xl"></i>
                </div>
                <h1 class="text-xl font-bold">DonGiv Admin</h1>
            </div>

            <nav class="space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-item active flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.donations.index') }}" class="nav-item flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Verifikasi Donasi</span>
                </a>
                <a href="{{ route('admin.campaigns.index') }}" class="nav-item flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-donate"></i>
                    <span>Kampanye Donasi</span>
                </a>
                <a href="{{ route('admin.relawan.index') }}" class="nav-item flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-hands-helping"></i>
                    <span>Kampanye Relawan</span>
                </a>
                <a href="{{ route('admin.verifikasi-relawan.index') }}" class="nav-item flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-user-check"></i>
                    <span>Verifikasi Relawan</span>
                </a>
                <a href="{{ route('admin.notifications.index') }}" class="nav-item flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-bell"></i>
                    <span>Notifikasi</span>
                </a>
                <a href="#" class="nav-item flex items-center space-x-3 py-3 px-4">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </nav>
        </div>

        <div class="absolute bottom-6 left-6 right-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-500/80 hover:bg-red-600 text-white py-3 px-4 rounded-lg flex items-center justify-center space-x-2 transition-colors">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-auto">
        <header class="mb-8 fade-in">
            <h2 class="text-3xl font-bold text-gray-800">Dashboard Admin</h2>
            <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}!</p>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stat-card card p-6 rounded-xl glow">
                <div class="content">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Total Donasi</p>
                            <p class="text-3xl font-bold text-primary mt-1">Rp 42.500.000</p>
                            <div class="mt-2">
                                <div class="progress-bar">
                                    <div class="progress-fill bg-blue-500" style="width: 75%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">75% dari target</p>
                            </div>
                        </div>
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center pulse">
                            <i class="fas fa-hand-holding-usd text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-card card p-6 rounded-xl">
                <div class="content">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Kampanye Aktif</p>
                            <p class="text-3xl font-bold text-primary mt-1">18</p>
                            <div class="mt-2">
                                <div class="progress-bar">
                                    <div class="progress-fill bg-green-500" style="width: 60%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">6 dari 10 selesai</p>
                            </div>
                        </div>
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-donate text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-card card p-6 rounded-xl">
                <div class="content">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Relawan Terdaftar</p>
                            <p class="text-3xl font-bold text-primary mt-1">124</p>
                            <div class="mt-2">
                                <div class="progress-bar">
                                    <div class="progress-fill bg-purple-500" style="width: 85%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Naik 8% dari bulan lalu</p>
                            </div>
                        </div>
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stat-card card p-6 rounded-xl">
                <div class="content">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 font-medium">Kampanye Relawan</p>
                            <p class="text-3xl font-bold text-primary mt-1">8</p>
                            <div class="mt-2">
                                <div class="progress-bar">
                                    <div class="progress-fill bg-yellow-500" style="width: 45%"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">2 kampanye aktif</p>
                            </div>
                        </div>
                        <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-people-group text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Donations Chart -->
            <div class="card p-6 rounded-xl fade-in">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Statistik Donasi Bulanan</h3>
                <div class="chart-container">
                    <canvas id="donationsChart"></canvas>
                </div>
            </div>

            <!-- Campaigns Chart -->
            <div class="card p-6 rounded-xl fade-in">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Perbandingan Kampanye</h3>
                <div class="chart-container">
                    <canvas id="campaignsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="card p-6 rounded-xl mb-8 fade-in">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                <div class="flex items-start space-x-4 p-4 rounded-lg hover:bg-blue-50 transition-colors">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-plus text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">Kampanye relawan baru dibuat</p>
                        <p class="text-gray-600 text-sm">Kampanye "Gotong Royong Lingkungan" dibuat oleh admin</p>
                        <p class="text-gray-400 text-sm">10 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 p-4 rounded-lg hover:bg-blue-50 transition-colors">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-check text-blue-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">Relawan baru terdaftar</p>
                        <p class="text-gray-600 text-sm">Susi Kurnia mendaftar sebagai relawan</p>
                        <p class="text-gray-400 text-sm">30 menit yang lalu</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 p-4 rounded-lg hover:bg-blue-50 transition-colors">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-plus text-purple-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">Pengguna baru terdaftar</p>
                        <p class="text-gray-600 text-sm">Andi Prasetyo mendaftar sebagai donatur</p>
                        <p class="text-gray-400 text-sm">2 jam yang lalu</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4 p-4 rounded-lg hover:bg-blue-50 transition-colors">
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-check-circle text-yellow-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-800">Relawan disetujui</p>
                        <p class="text-gray-600 text-sm">Relawan Budi Santoso disetujui untuk kampanye</p>
                        <p class="text-gray-400 text-sm">4 jam yang lalu</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card p-6 rounded-xl fade-in">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <a href="{{ route('admin.campaigns.create') }}" class="bg-blue-100 hover:bg-blue-200 text-blue-800 py-3 px-4 rounded-lg text-center transition-colors">
                    <i class="fas fa-plus-circle block text-xl mb-2"></i>
                    <span class="font-medium">Tambah Kampanye</span>
                </a>
                <a href="{{ route('admin.relawan.create') }}" class="bg-green-100 hover:bg-green-200 text-green-800 py-3 px-4 rounded-lg text-center transition-colors">
                    <i class="fas fa-users block text-xl mb-2"></i>
                    <span class="font-medium">Kampanye Relawan</span>
                </a>
                <a href="{{ route('admin.relawan.index') }}" class="bg-purple-100 hover:bg-purple-200 text-purple-800 py-3 px-4 rounded-lg text-center transition-colors">
                    <i class="fas fa-hands-helping block text-xl mb-2"></i>
                    <span class="font-medium">Lihat Kampanye</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Initialize charts when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Donations Chart
            const donationsCtx = document.getElementById('donationsChart').getContext('2d');
            const donationsChart = new Chart(donationsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Donasi (Rp Juta)',
                        data: [12, 19, 15, 22, 18, 25, 20, 28, 24, 30, 27, 32],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        pointBackgroundColor: '#3b82f6',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            });

            // Campaigns Chart
            const campaignsCtx = document.getElementById('campaignsChart').getContext('2d');
            const campaignsChart = new Chart(campaignsCtx, {
                type: 'bar',
                data: {
                    labels: ['Pendidikan', 'Kesehatan', 'Bencana', 'Lingkungan', 'Umat'],
                    datasets: [{
                        label: 'Jumlah Kampanye',
                        data: [24, 18, 15, 10, 22],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(16, 185, 129, 0.7)',
                            'rgba(245, 158, 11, 0.7)',
                            'rgba(139, 92, 246, 0.7)',
                            'rgba(239, 68, 68, 0.7)'
                        ],
                        borderColor: [
                            'rgba(59, 130, 246, 1)',
                            'rgba(16, 185, 129, 1)',
                            'rgba(245, 158, 11, 1)',
                            'rgba(139, 92, 246, 1)',
                            'rgba(239, 68, 68, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            });

            // Animate progress bars
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });
        });
    </script>
</body>
</html>