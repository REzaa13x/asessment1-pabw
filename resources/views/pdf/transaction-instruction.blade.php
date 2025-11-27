<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruksi Transfer Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #1CABE2;
            padding-bottom: 15px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }
        
        .title {
            font-size: 24px;
            color: #1CABE2;
            margin: 0;
            font-weight: bold;
        }
        
        .subtitle {
            font-size: 16px;
            color: #666;
            margin: 5px 0 0 0;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 20px 0 30px 0;
        }
        
        .info-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            border-radius: 8px;
        }
        
        .info-label {
            font-size: 12px;
            color: #718096;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 16px;
            font-weight: bold;
            color: #2d3748;
        }
        
        .bank-info {
            background-color: #f0f9ff;
            border: 1px solid #bee3f8;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .amount {
            font-size: 24px;
            color: #e53e3e;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }
        
        .instructions {
            margin: 25px 0;
        }
        
        .step {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }
        
        .step-number {
            background-color: #1CABE2;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 10px;
            font-weight: bold;
            font-size: 12px;
        }
        
        .step-content {
            flex: 1;
        }
        
        .step-title {
            font-weight: bold;
            margin-bottom: 3px;
        }
        
        .step-desc {
            font-size: 14px;
            color: #4a5568;
        }
        
        .notes {
            background-color: #fffbeb;
            border: 1px solid #f6e05e;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
        
        .notes-title {
            font-weight: bold;
            color: #975a16;
            margin-bottom: 8px;
        }
        
        .notes-list {
            margin-left: 20px;
        }
        
        .notes-item {
            margin-bottom: 5px;
            font-size: 12px;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #718096;
            border-top: 1px solid #e2e8f0;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <!-- Placeholder for logo - you can replace with actual logo -->
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4MCIgaGVpZ2h0PSI4MCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiMxQ0FCRTIiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cmVjdCB4PSIzIiB5PSIzIiB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHJ4PSIyIiByeT0iMiI+PC9yZWN0PjxwYXRoIGQ9Ik05IDE2djRtNi0xMHYxMG0tNmgtNnY0aDZtLS42LTE0aDExIj48L3BhdGg+PC9zdmc+" alt="Logo">
        </div>
        <h1 class="title">DONASI INSTRUKSI TRANSFER</h1>
        <p class="subtitle">Organisasi DonGiv - Berbagi Kebaikan untuk Sesama</p>
    </div>

    <div class="info-grid">
        <div class="info-box">
            <div class="info-label">ORDER ID</div>
            <div class="info-value">{{ $transaction->order_id }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">TANGGAL PEMBUATAN</div>
            <div class="info-value">{{ $transaction->created_at->format('d M Y H:i') }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">JUMLAH DONASI</div>
            <div class="info-value">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">BATAS WAKTU TRANSFER</div>
            <div class="info-value">{{ $transaction->transfer_deadline->format('d M Y H:i') }}</div>
        </div>
    </div>

    <div class="info-grid">
        <div class="info-box">
            <div class="info-label">NAMA DONATUR</div>
            <div class="info-value">{{ $transaction->donor_name }}</div>
        </div>
        <div class="info-box">
            <div class="info-label">EMAIL</div>
            <div class="info-value">{{ $transaction->donor_email }}</div>
        </div>
    </div>

    <div class="info-grid">
        <div class="info-box">
            <div class="info-label">METODE PEMBAYARAN</div>
            <div class="info-value">
                @if($transaction->payment_method == 'bank_transfer')
                    Bank Transfer
                @elseif($transaction->payment_method == 'e_wallet')
                    e-Wallet
                @elseif($transaction->payment_method == 'qris')
                    QRIS
                @else
                    {{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}
                @endif
            </div>
        </div>
        <div class="info-box">
            <div class="info-label">STATUS</div>
            <div class="info-value">{{ $transaction->statusLabel }}</div>
        </div>
    </div>

    @if($transaction->campaign)
    <div class="info-grid">
        <div class="info-box">
            <div class="info-label">KAMPAK</div>
            <div class="info-value">{{ $transaction->campaign->title }}</div>
        </div>
    </div>
    @endif

    <div class="bank-info">
        <h2 style="margin-top: 0; color: #1CABE2; font-size: 18px;">INFORMASI REKENING TRANSFER</h2>
        <div class="amount">
            Rp {{ number_format($transaction->amount, 0, ',', '.') }}
        </div>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
            <div>
                <div style="font-size: 12px; color: #718096;">Nama Bank</div>
                <div style="font-weight: bold;">{{ $transaction->bank_name }}</div>
            </div>
            <div>
                <div style="font-size: 12px; color: #718096;">Nomor Rekening</div>
                <div style="font-weight: bold;">{{ $transaction->bank_account_number }}</div>
            </div>
            <div>
                <div style="font-size: 12px; color: #718096;">Atas Nama</div>
                <div style="font-weight: bold;">{{ $transaction->bank_account_name }}</div>
            </div>
            <div>
                <div style="font-size: 12px; color: #718096;">Status</div>
                <div style="font-weight: bold; color: #e6a23c;">{{ $transaction->statusLabel }}</div>
            </div>
        </div>
    </div>

    <div class="instructions">
        <h2 style="color: #2d3748; margin-top: 0;">LANGKAH-LANGKAH TRANSFER</h2>
        
        <div class="step">
            <div class="step-number">1</div>
            <div class="step-content">
                <div class="step-title">Transfer ke Rekening</div>
                <div class="step-desc">Lakukan transfer ke rekening di atas sesuai dengan jumlah donasi.</div>
            </div>
        </div>
        
        <div class="step">
            <div class="step-number">2</div>
            <div class="step-content">
                <div class="step-title">Simpan Bukti Transfer</div>
                <div class="step-desc">Screenshot atau foto bukti transfer dari aplikasi perbankan Anda.</div>
            </div>
        </div>
        
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-content">
                <div class="step-title">Upload Bukti Transfer</div>
                <div class="step-desc">Upload bukti transfer ke sistem DonGiv untuk verifikasi.</div>
            </div>
        </div>
    </div>

    <div class="notes">
        <div class="notes-title">CATATAN PENTING:</div>
        <ul class="notes-list">
            <li class="notes-item">Pastikan jumlah transfer sesuai dengan jumlah donasi yang ditentukan</li>
            <li class="notes-item">Transfer harus dilakukan sebelum batas waktu {{ $transaction->transfer_deadline->format('d M Y H:i') }}</li>
            <li class="notes-item">Jika transfer dilakukan setelah batas waktu, transaksi akan otomatis dibatalkan</li>
            <li class="notes-item">Simpan bukti transfer Anda sebagai referensi</li>
            <li class="notes-item">Status donasi akan diperbarui setelah verifikasi admin selesai</li>
        </ul>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} DonGiv. Organisasi Amal Berbasis Komunitas</p>
        <p>Email: info@dongiv.org | Telepon: (021) 1234-5678</p>
        <p>Alamat: Jl. Amal No. 123, Jakarta, Indonesia</p>
    </div>
</body>
</html>