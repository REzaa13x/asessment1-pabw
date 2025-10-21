<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
    /* Sidebar biru tua */
    .sidebar {
        width: 250px;
        background-color: #003366;
        color: white;
        min-height: 100vh;
        position: relative;
        z-index: 10;
    }

    .sidebar a {
        color: white;
        padding: 10px 15px;
        text-decoration: none;
        display: block;
    }

    .sidebar a:hover {
        background-color: #0056b3;
    }

    /* Area konten utama */
    .content-area {
        flex-grow: 1;
        padding: 20px;
        background-color: #f8f9fa;
        position: relative;
        z-index: 1;
    }

    /* Pastikan tombol tetap bisa diklik */
    a.btn, button.btn {
        position: relative;
        z-index: 20;
        cursor: pointer;
    }
</style>

</head>
<body>
    <div class="d-flex">
        
        {{-- Sidebar (Biru Tua) --}}
        <div class="sidebar p-3">
            <h4 class="text-center mb-4 border-bottom pb-2">Admin Donasi</h4>
           <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.campaigns.*') ? 'fw-bold' : '' }}" href="{{ route('admin.campaigns.index') }}">
            Manajemen Kampanye
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('profiles.*') ? 'fw-bold' : '' }}" href="{{ route('profiles.index') }}">
            Kelola Profil
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.notifications.index') }}">
        Notifikasi Admin
    </a>
</li>
</ul>

        </div>

        {{-- Area Konten Utama (Putih) --}}
        <div class="content-area">
            {{-- Header (Opsional, bisa putih) --}}
            <header class="mb-4 pb-3 border-bottom">
                <h3>Dashboard</h3>
            </header>
            
            {{-- Konten dari View anak akan dimasukkan di sini --}}
            @yield('content')
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>