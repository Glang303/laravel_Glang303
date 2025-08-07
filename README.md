Proyek Aplikasi Medical
Proyek ini dikembangkan sebagai bagian dari proses screening untuk program magang di Teracorp.

Deskripsi Proyek
Aplikasi Medical adalah sebuah sistem sederhana berbasis web yang dibangun dengan framework Laravel. Aplikasi ini berfungsi untuk mengelola data rumah sakit dan data pasien. Fungsionalitas utama yang diimplementasikan mencakup:

Manajemen Data Rumah Sakit: Memungkinkan pengguna untuk melakukan operasi dasar CRUD (Create, Read, Update, Delete) pada data rumah sakit.

Manajemen Data Pasien: Memungkinkan pengguna untuk melakukan operasi CRUD pada data pasien, dengan relasi yang terhubung ke data rumah sakit.

Filter Data: Terdapat fitur filter pada data pasien untuk menampilkan data berdasarkan rumah sakit tertentu.

Autentikasi: Sistem dilengkapi dengan fitur registrasi dan login untuk membatasi akses pengguna.

Penggunaan AJAX: Sebagian besar interaksi CRUD diimplementasikan menggunakan AJAX, sehingga memungkinkan pengalaman pengguna yang lebih responsif tanpa memuat ulang halaman.

Teknologi yang Digunakan
Framework: Laravel 10

Database: MySQL

Front-end: HTML, CSS, JavaScript, jQuery, Bootstrap 5

Version Control: Git

Fitur Utama
CRUD Data Rumah Sakit

CRUD Data Pasien

Relasi Data Pasien dengan Rumah Sakit

Pendaftaran Akun

Login dan Logout

Filter data pasien dinamis

Antarmuka pengguna yang responsif

Cara Memulai Proyek
Clone repositori ini:

git clone [URL-REPOSITORI-ANDA]

Masuk ke direktori proyek:

cd nama-proyek

Instal Composer dependencies:

composer install

Konfigurasi environment file:
Salin file .env.example menjadi .env dan atur kredensial database Anda.

cp .env.example .env

Jalankan migrasi database dan seeder:

php artisan migrate --seed

Jalankan server:

php artisan serve

Aplikasi akan berjalan di http://127.0.0.1:8000.

Terima kasih atas kesempatan untuk mengikuti proses screening ini.
