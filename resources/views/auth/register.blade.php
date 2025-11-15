<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DonGiv</title>
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
                        accent: '#f59e0b', // warna aksen, misal: oranye
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
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.05);
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            border-color: #3b82f6;
        }
        .btn-primary {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #1d4ed8 0%, #3b82f6 100%);
            position: relative;
            overflow: hidden;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        .role-card {
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            background: white;
        }
        .role-card:hover {
            border-color: #3b82f6;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }
        .role-card.active {
            border-color: #3b82f6;
            background-color: #dbeafe;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2);
        }
        .gradient-text {
            background: linear-gradient(135deg, #1d4ed8 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .feature-icon {
            width: 3rem;
            height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        .feature-icon:hover {
            transform: scale(1.1);
            background: rgba(255, 255, 255, 0.3);
        }
        .input-group {
            position: relative;
            transition: all 0.3s ease;
        }
        .input-group:focus-within {
            transform: translateY(-2px);
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="max-w-4xl w-full grid lg:grid-cols-2 gap-0 rounded-3xl overflow-hidden shadow-2xl">
        <!-- Left Side - Branding -->
        <div class="bg-gradient-to-br from-indigo-600 to-blue-500 p-12 text-white hidden lg:flex flex-col justify-center relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute -top-20 -right-20 w-48 h-48 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-20 -left-20 w-48 h-48 bg-white/10 rounded-full"></div>

            <div class="text-center z-10">
                <div class="text-6xl mb-6 fade-in">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 100 100">
                        <path
                            d="M50 75l-25-25c-10-10-15-20-5-30 10-10 25-10 35 0 10-10 25-10 35 0 10 10 5 20-5 30z"
                            fill="white" opacity="0.9"/>
                        <text x="50" y="85" text-anchor="middle" font-family="Arial, sans-serif"
                              font-size="14" fill="white" font-weight="bold" opacity="0.9">DonGiv</text>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold mb-4 fade-in">DonGiv</h1>
                <p class="text-xl opacity-90 mb-8 max-w-md mx-auto fade-in" style="animation-delay: 0.1s;">Bergabunglah untuk Membantu Sesama</p>
                <div class="space-y-4 text-left max-w-md mx-auto fade-in" style="animation-delay: 0.2s;">
                    <div class="flex items-center space-x-4">
                        <div class="feature-icon">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Daftar dengan Mudah dan Cepat</h3>
                            <p class="text-sm opacity-80">Proses registrasi yang simpel</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="feature-icon">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Pilih Peran yang Sesuai</h3>
                            <p class="text-sm opacity-80">Donatur atau admin platform</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="feature-icon">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold">Amankan Dana untuk Kebajikan</h3>
                            <p class="text-sm opacity-80">Platform donasi yang terpercaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="bg-white/90 backdrop-blur-sm p-8 lg:p-12">
            <div class="text-center mb-8 fade-in">
                <div class="mx-auto w-20 h-20 bg-blue-100/80 rounded-full flex items-center justify-center mb-4 lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 100 100">
                        <path
                            d="M50 75l-25-25c-10-10-15-20-5-30 10-10 25-10 35 0 10-10 25-10 35 0 10 10 5 20-5 30z"
                            fill="#1d4ed8" opacity="0.8"/>
                        <text x="50" y="75" text-anchor="middle" font-family="Arial, sans-serif"
                              font-size="12" fill="#1d4ed8" font-weight="bold" opacity="0.8">D</text>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    <span class="gradient-text">Daftar ke DonGiv</span>
                </h2>
                <p class="text-gray-600">Pilih peran Anda dan mulai berdonasi</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50/80 border border-red-200 text-red-600 p-4 rounded-xl mb-6 fade-in">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST" class="fade-in">
                @csrf
                <!-- Role Selection - Only Donatur is available -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold mb-4">
                        <i class="fas fa-user-tag mr-2"></i>Peran Akun
                    </label>
                    <div class="role-card p-5">
                        <div class="flex items-center">
                            <input type="hidden" name="role" value="donatur">
                            <div class="w-6 h-6 rounded-full border-2 border-blue-500 mr-3 flex items-center justify-center bg-blue-500">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Donatur</h3>
                                <p class="text-sm text-gray-600">Mendukung kegiatan sosial</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2 text-center">Akun Anda akan terdaftar sebagai Donatur</p>
                </div>

                <div class="mb-6 input-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="name">
                        <i class="fas fa-user mr-2"></i>Nama Lengkap
                    </label>
                    <div class="relative">
                        <input type="text" id="name" name="name"
                               class="input-field w-full border border-gray-200 p-4 rounded-xl focus:outline-none focus:border-blue-300 pl-12 bg-gray-50/50"
                               placeholder="masukkan nama lengkap" required>
                        <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                    </div>
                </div>

                <div class="mb-6 input-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="email">
                        <i class="fas fa-envelope mr-2"></i>Email
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email"
                               class="input-field w-full border border-gray-200 p-4 rounded-xl focus:outline-none focus:border-blue-300 pl-12 bg-gray-50/50"
                               placeholder="masukkan email" required>
                        <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                    </div>
                </div>

                <div class="mb-6 input-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="password">
                        <i class="fas fa-lock mr-2"></i>Kata Sandi
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                               class="input-field w-full border border-gray-200 p-4 rounded-xl focus:outline-none focus:border-blue-300 pl-12 bg-gray-50/50"
                               placeholder="masukkan kata sandi" required>
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                    </div>
                </div>

                <div class="mb-6 input-group">
                    <label class="block text-gray-700 font-semibold mb-2" for="password_confirmation">
                        <i class="fas fa-lock mr-2"></i>Konfirmasi Kata Sandi
                    </label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="input-field w-full border border-gray-200 p-4 rounded-xl focus:outline-none focus:border-blue-300 pl-12 bg-gray-50/50"
                               placeholder="konfirmasi kata sandi" required>
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400"></i>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" name="terms" required
                               class="mt-1 h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            Saya setuju dengan <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Syarat dan Ketentuan</a> serta <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Kebijakan Privasi</a>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-primary w-full py-4 px-4 rounded-xl text-white font-semibold text-lg mb-6 relative overflow-hidden">
                    <span class="relative z-10"><i class="fas fa-user-plus mr-2"></i>Daftar</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-400 opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                </button>
            </form>

            <div class="text-center fade-in">
                <p class="text-gray-600">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:text-blue-800 transition">
                        Masuk Disini
                    </a>
                </p>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100 fade-in">
                <div class="text-center">
                    <p class="text-sm text-gray-500">
                        <i class="fas fa-shield-alt mr-1"></i>Informasi Anda aman bersama kami
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // No role selection needed since only donatur is available
        // The role is set via hidden input field
    </script>
</body>
</html>