# DonGiv - Platform Donasi Terpercaya

DonGiv adalah platform donasi terpercaya yang memungkinkan pengguna untuk membantu sesama melalui donasi yang mudah dan aman.

## Fitur

- Donasi mudah dan aman
- Transparansi penggunaan dana
- Dampak nyata untuk penerima bantuan
- Sistem admin untuk mengelola kampanye donasi

## Prasyarat Sistem

- PHP >= 8.1
- Composer
- Database (MySQL, PostgreSQL, atau SQLite)
- Node.js & npm (opsional, untuk asset compilation)

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi:

### 1. Clone repository atau download kode

```bash
git clone <repository-url>
cd Assesment-PABW
```

### 2. Install dependencies PHP

```bash
composer install
```

### 3. Salin file .env dan konfigurasi

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Migrate dan seed database

```bash
php artisan migrate --seed
```

Perintah ini akan:
- Membuat struktur database
- Membuat pengguna admin default (email: admin@gmail.com, password: 12345678)

### 6. Jalankan aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://127.0.0.1:8000`

## Akun Default

### Akun Admin
- Email: `admin@gmail.com`
- Password: `12345678`

Anda dapat mengganti password default setelah login.

## Kontribusi

Saat Anda atau rekan Anda melakukan `git pull` dari repository, pastikan untuk menjalankan perintah berikut agar aplikasi tetap berjalan dengan baik:

```bash
# Update dependency PHP
composer install

# Update struktur database (jika ada perubahan migrasi)
php artisan migrate

# Jalankan seeder jika diperlukan (akan menambahkan akun admin jika belum ada)
php artisan db:seed
```

## Troubleshooting

### Masalah Login Setelah Git Pull

Jika Anda atau rekan Anda mengalami masalah login setelah melakukan `git pull`:

1. Pastikan semua dependency PHP terinstal: `composer install`
2. Jalankan migrasi database: `php artisan migrate`
3. Pastikan pengguna admin telah dibuat: `php artisan db:seed`
4. Pastikan file `.env` sudah dikonfigurasi dengan benar
5. Bersihkan cache: `php artisan config:clear` dan `php artisan cache:clear`

### Membuat Akun Admin Manual

Jika akun admin tidak ada, Anda dapat membuatnya melalui Tinker:

```bash
php artisan tinker
```

Lalu di dalam tinker:
```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => Hash::make('password123'),
    'role' => 'admin',
]);
```
