<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya Biru Tua untuk Sidebar */
        .sidebar {
            width: 250px;
            background-color: #003366; /* Biru Tua */
            color: white;
            min-height: 100vh;
        }
        .content-area {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa; /* Putih/Abu-abu Muda */
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #0056b3; /* Biru sedang saat hover */
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
                    {{-- Navigasi ke Daftar Kampanye --}}
                    <a class="nav-link active" href="{{ route('admin.campaigns.index') }}">
                        Manajemen Kampanye
                    </a>
                </li>
                {{-- Tambahkan link navigasi lain di sini --}}
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