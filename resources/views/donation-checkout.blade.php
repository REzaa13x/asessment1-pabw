<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout Donasi - DonGiv</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-gradient-to-br from-blue-50 to-cyan-50 text-gray-800 min-h-screen">
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

    <!-- Main Content -->
    <main class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Formulir Donasi</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Berikan kontribusi Anda untuk membantu mewujudkan perubahan positif di masyarakat
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-gray-100">
                        <!-- Campaign Info -->
                        @if($campaign)
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-5 rounded-xl mb-8 border border-blue-100">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-hand-holding-heart text-blue-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">{{ $campaign->title }}</h3>
                                    <div class="flex flex-wrap gap-4 mt-2 text-sm text-gray-600">
                                        <span class="flex items-center">
                                            <i class="fas fa-coins mr-1"></i>
                                            Target: <span class="font-medium ml-1">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                                        </span>
                                        <span class="flex items-center">
                                            <i class="fas fa-chart-line mr-1"></i>
                                            Tercapai: <span class="font-medium ml-1">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Donation Form -->
                        <form id="donationForm" action="{{ route('donation.process') }}" method="POST" class="space-y-6">
                            @csrf
                            @if($campaign)
                                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                            @endif

                            <!-- Amount Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Jumlah Donasi</label>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
                                    <button type="button" class="amount-btn py-3 px-4 border border-gray-300 rounded-xl text-center font-medium hover:bg-blue-50 hover:border-blue-300 transition-all" data-amount="50000">Rp 50.000</button>
                                    <button type="button" class="amount-btn py-3 px-4 border border-gray-300 rounded-xl text-center font-medium hover:bg-blue-50 hover:border-blue-300 transition-all" data-amount="100000">Rp 100.000</button>
                                    <button type="button" class="amount-btn py-3 px-4 border border-gray-300 rounded-xl text-center font-medium hover:bg-blue-50 hover:border-blue-300 transition-all" data-amount="200000">Rp 200.000</button>
                                    <button type="button" class="amount-btn py-3 px-4 border border-gray-300 rounded-xl text-center font-medium hover:bg-blue-50 hover:border-blue-300 transition-all" data-amount="500000">Rp 500.000</button>
                                </div>

                                <div class="relative mt-2">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">Rp</span>
                                    <input type="number"
                                           name="amount"
                                           id="custom_amount"
                                           placeholder="Atau masukkan jumlah lain"
                                           class="w-full pl-10 pr-3 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="donor_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                                    <input type="text"
                                           name="donor_name"
                                           id="donor_name"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="donor_email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                    <input type="email"
                                           name="donor_email"
                                           id="donor_email"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="donor_phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                                    <input type="tel"
                                           name="donor_phone"
                                           id="donor_phone"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           placeholder="Contoh: 081234567890">
                                </div>

                                <div>
                                    <label for="donor_anonymous" class="block text-sm font-medium text-gray-700 mb-2">Jenis Donasi</label>
                                    <select name="anonymous" id="donor_anonymous" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="0" selected>Donasi Terbuka (Nama akan ditampilkan)</option>
                                        <option value="1">Donasi Anonim (Nama disembunyikan)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Payment Method Selection -->
                            <div class="pt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Metode Pembayaran</label>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
                                    <label class="relative flex flex-col items-center p-4 border border-gray-300 rounded-xl cursor-pointer transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50">
                                        <input type="radio" name="payment_method" value="bank_transfer" class="sr-only peer" checked>
                                        <i class="fas fa-university text-2xl mb-2 text-blue-600"></i>
                                        <span class="font-medium">Bank Transfer</span>
                                        <span class="text-xs text-gray-500 mt-1">via ATM/M-banking</span>
                                        <div class="absolute top-2 right-2 w-5 h-5 rounded-full border border-gray-300 peer-checked:border-blue-500 peer-checked:bg-blue-500 flex items-center justify-center">
                                            <div class="w-2 h-2 rounded-full bg-white hidden peer-checked:block"></div>
                                        </div>
                                    </label>

                                    <label class="relative flex flex-col items-center p-4 border border-gray-300 rounded-xl cursor-pointer transition-all peer-checked:border-green-500 peer-checked:bg-green-50">
                                        <input type="radio" name="payment_method" value="e_wallet" class="sr-only peer">
                                        <i class="fab fa-google-pay text-2xl mb-2 text-green-600"></i>
                                        <span class="font-medium">e-Wallet</span>
                                        <span class="text-xs text-gray-500 mt-1">OVO, GoPay, DANA</span>
                                        <div class="absolute top-2 right-2 w-5 h-5 rounded-full border border-gray-300 peer-checked:border-green-500 peer-checked:bg-green-500 flex items-center justify-center">
                                            <div class="w-2 h-2 rounded-full bg-white hidden peer-checked:block"></div>
                                        </div>
                                    </label>

                                    <label class="relative flex flex-col items-center p-4 border border-gray-300 rounded-xl cursor-pointer transition-all peer-checked:border-purple-500 peer-checked:bg-purple-50">
                                        <input type="radio" name="payment_method" value="qris" class="sr-only peer">
                                        <i class="fas fa-qrcode text-2xl mb-2 text-purple-600"></i>
                                        <span class="font-medium">QRIS</span>
                                        <span class="text-xs text-gray-500 mt-1">Scan QR code</span>
                                        <div class="absolute top-2 right-2 w-5 h-5 rounded-full border border-gray-300 peer-checked:border-purple-500 peer-checked:bg-purple-500 flex items-center justify-center">
                                            <div class="w-2 h-2 rounded-full bg-white hidden peer-checked:block"></div>
                                        </div>
                                    </label>
                                </div>

                                <!-- Bank Transfer Options -->
                                <div id="bankTransferOptions" class="payment-options active">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Bank:</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-50">
                                            <input type="radio" name="selected_bank" value="BCA" class="mr-2" checked>
                                            <span>BCA</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-50">
                                            <input type="radio" name="selected_bank" value="BNI" class="mr-2">
                                            <span>BNI</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-50">
                                            <input type="radio" name="selected_bank" value="Mandiri" class="mr-2">
                                            <span>Mandiri</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-blue-50">
                                            <input type="radio" name="selected_bank" value="BRI" class="mr-2">
                                            <span>BRI</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- e-Wallet Options -->
                                <div id="eWalletOptions" class="payment-options mt-4 hidden">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih e-Wallet:</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-green-50">
                                            <input type="radio" name="selected_ewallet" value="OVO" class="mr-2">
                                            <span>OVO</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-green-50">
                                            <input type="radio" name="selected_ewallet" value="GoPay" class="mr-2" checked>
                                            <span>GoPay</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-green-50">
                                            <input type="radio" name="selected_ewallet" value="DANA" class="mr-2">
                                            <span>DANA</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-green-50">
                                            <input type="radio" name="selected_ewallet" value="ShopeePay" class="mr-2">
                                            <span>ShopeePay</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- QRIS Options -->
                                <div id="qrisOptions" class="payment-options mt-4 hidden">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih QRIS:</label>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-purple-50">
                                            <input type="radio" name="selected_qris" value="DANA" class="mr-2">
                                            <span>DANA</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-purple-50">
                                            <input type="radio" name="selected_qris" value="ShopeePay" class="mr-2">
                                            <span>ShopeePay</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-purple-50">
                                            <input type="radio" name="selected_qris" value="GoPay" class="mr-2" checked>
                                            <span>GoPay</span>
                                        </label>
                                        <label class="flex items-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-purple-50">
                                            <input type="radio" name="selected_qris" value="LinkAja" class="mr-2">
                                            <span>LinkAja</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Info Section -->
                            <div class="bg-amber-50 p-5 rounded-xl border border-amber-200">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 mr-3">
                                        <i class="fas fa-info-circle text-amber-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-amber-800 mb-1">Proses Donasi</h3>
                                        <p class="text-amber-700 text-sm">
                                            Setelah mengisi formulir, Anda akan diarahkan ke halaman instruksi transfer.
                                            Lakukan pembayaran ke rekening yang tertera dan upload bukti transfer.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="submit" id="submitBtn" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg">
                                    <i class="fas fa-donate mr-2"></i>Buat Donasi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column - Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 sticky top-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">Kepercayaan Donatur</h3>

                        <div class="space-y-5">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="bg-green-100 w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-shield-alt text-green-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Aman & Terpercaya</h4>
                                    <p class="text-sm text-gray-600">Donasi Anda akan digunakan sesuai dengan tujuan</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-receipt text-blue-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Transparan</h4>
                                    <p class="text-sm text-gray-600">Laporan penggunaan dana tersedia untuk Anda</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="bg-amber-100 w-10 h-10 rounded-full flex items-center justify-center">
                                        <i class="fas fa-hand-holding-heart text-amber-600"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Dampak Nyata</h4>
                                    <p class="text-sm text-gray-600">Donasi Anda langsung membantu masyarakat</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <h4 class="font-bold text-gray-800 mb-4 text-center">Metode Pembayaran</h4>
                            <div class="flex justify-center space-x-4">
                                <div class="text-center">
                                    <div class="bg-gray-100 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-2">
                                        <i class="fab fa-cc-visa text-blue-600"></i>
                                    </div>
                                    <span class="text-xs text-gray-600">Bank</span>
                                </div>
                                <div class="text-center">
                                    <div class="bg-gray-100 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-2">
                                        <i class="fab fa-cc-mastercard text-red-600"></i>
                                    </div>
                                    <span class="text-xs text-gray-600">e-Wallet</span>
                                </div>
                                <div class="text-center">
                                    <div class="bg-gray-100 w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-2">
                                        <i class="fab fa-paypal text-blue-500"></i>
                                    </div>
                                    <span class="text-xs text-gray-600">QRIS</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial Section -->
                    <div class="bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl shadow-lg p-6 mt-6 text-white">
                        <h3 class="font-bold text-lg mb-3">Kata Mereka</h3>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-3">
                                <div class="bg-white/20 w-10 h-10 rounded-full flex items-center justify-center">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                            </div>
                            <p class="text-sm italic">"Setiap donasi membawa harapan dan perubahan nyata untuk masyarakat yang membutuhkan."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Amount buttons functionality
            const amountButtons = document.querySelectorAll('.amount-btn');
            const customAmountInput = document.getElementById('custom_amount');

            amountButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    amountButtons.forEach(btn => {
                        btn.classList.remove('border-blue-500', 'bg-blue-50');
                    });

                    // Add active class to clicked button
                    this.classList.add('border-blue-500', 'bg-blue-50');

                    // Set value to custom input
                    customAmountInput.value = this.getAttribute('data-amount');
                });
            });

            // Update button highlight based on custom input
            customAmountInput.addEventListener('input', function() {
                amountButtons.forEach(btn => btn.classList.remove('border-blue-500', 'bg-blue-50'));
            });

            // Payment method selection
            const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
            const bankOptions = document.getElementById('bankTransferOptions');
            const ewalletOptions = document.getElementById('eWalletOptions');
            const qrisOptions = document.getElementById('qrisOptions');

            paymentMethodRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Hide all options
                    bankOptions.classList.add('hidden');
                    ewalletOptions.classList.add('hidden');
                    qrisOptions.classList.add('hidden');

                    // Show selected option
                    if (this.value === 'bank_transfer') {
                        bankOptions.classList.remove('hidden');
                    } else if (this.value === 'e_wallet') {
                        ewalletOptions.classList.remove('hidden');
                    } else if (this.value === 'qris') {
                        qrisOptions.classList.remove('hidden');
                    }
                });
            });
        });
    </script>
</body>
</html>