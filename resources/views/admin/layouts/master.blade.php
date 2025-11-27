<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1d4ed8', // biru utama
                        secondary: '#3b82f6', // biru lebih muda
                        accent: '#f59e0b', // warna aksen

                        softblue: '#f0f9ff', // background lebih soft
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
            min-height: 100vh;
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
        .content-wrapper {
            flex-grow: 1;
            min-height: 100vh;
            padding-top: 2rem;
            padding-bottom: 2rem;
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
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.donations.index') }}" class="nav-item {{ request()->routeIs('admin.donations.*') ? 'active' : '' }} flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-money-check-alt"></i>
                    <span>Verifikasi Donasi</span>
                </a>

                <a href="{{ route('admin.campaigns.index') }}" class="nav-item {{ request()->routeIs('admin.campaigns.*') ? 'active' : '' }} flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-donate"></i>
                    <span>Kampanye Donasi</span>
                </a>

                <a href="{{ route('admin.relawan.index') }}" class="nav-item {{ request()->routeIs('admin.relawan.*') || request()->routeIs('admin.verifikasi-relawan.*') ? 'active' : '' }} flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-hands-helping"></i>
                    <span>Kampanye Relawan</span>
                </a>

                <a href="{{ route('admin.verifikasi-relawan.index') }}" class="nav-item {{ request()->routeIs('admin.verifikasi-relawan.*') ? 'active' : '' }} flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-user-check"></i>
                    <span>Daftar Relawan</span>
                </a>

                <a href="{{ route('admin.notifications.index') }}" class="nav-item {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }} flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-bell"></i>
                    <span>Notifikasi</span>
                </a>

                <a href="#" class="nav-item flex items-center space-x-3 py-3 px-4">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>

                <a href="{{ route('profiles.index') }}" class="nav-item {{ request()->routeIs('profiles.*') ? 'active' : '' }} flex items-center space-x-3 py-3 px-4 mb-2">
                    <i class="fas fa-user"></i>
                    <span>Profil Saya</span>
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
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>