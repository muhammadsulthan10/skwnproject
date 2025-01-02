# Proyek Sekawan Media Internship

## Daftar Username dan Password

- **Admin**
  - Username: `Siska`
  - Password: `password1`

- **Approver**
  - Username: `Margaret`
  - Password: `password2`

  - Username: `Naufal`
  - Password: `password3`

## Versi yang Digunakan

### 1. Versi phpmyadmin
- **phpmyadmin**: `5.2.1`

### 2. Versi PHP
- **PHP**: `8.2.12`

### 3. Versi Laravel
- **Laravel**: `11.36.1`

### 4. Versi Tailwind CSS
- **Tailwind CSS**: `3.4.17

## Persyaratan

Pastikan perangkat Anda memiliki versi PHP, MySQL, dan Laravel yang sesuai dengan yang tercantum di atas untuk menjalankan proyek ini dengan lancar.
Pastikan memiliki web server yang dapat digunakan (direkomendasikan XAMPP)

## Cara Instalasi

1. **Install Aplikasi**:
   - Buka Command Prompt atau Powershell
   - Jalankan perintah "php artisan migrate", ikuti langkah instalasi berikutnya
   - Jalankan perintah "php artisan db:seed"

2. **Jalankan Aplikasi**:
   - Jalankan perintah "php artisan serve"
   - Copy Paste url yang muncul ke browser anda
   - Aplikasi siap digunakan

3. **Layout Utama**:
   - Aplikasi ini memiliki 6 halaman
   - Halaman utama adalah Dashboard yang akan menampilkan jumlah kendaraan kargo dan penumpang yang tersedia dan driver yang tersedia. Selain itu ada Line Chart yang akan menampilkan frekuensi booking kendaraan per hari (dapat diatur rentang tanggalnya). Kemudian juga menampilkan driver yang sedang ditugaskan beserta Merk mobil dan plat nomornya.
   - Halaman selanjutnya adalah Bookings yang akan menampilkan tabel booking kendaraan secara global.
   - Halaman selanjutnya adalah User yang akan menampilkan tabel user, foto profil, dan jabatan.
   - Halaman selanjutnya adalah Vehicle yang akan menampilkan tabel armada kendaraan secara global lengkap dengan jadwal service dan konsumsi BBMnya (km/liter).
   - Halaman selanjutnya adalah Driver yang akan menampilkan tabel driver secara global.
   - Halaman selanjutnya adalah Log yang akan menampilkan log aplikasi ketika digunakan.

4. **Fitur Utama**:
   - Fitur utama aplikasi ini adalah Line Chart harian yang dapat diatur rentang tanggalnya.
   - Fitur berikutnya adalah user dapat mengunduh laporan periodik pemesanan kendaraan dengan tombol 'Eksport'
   - Di tiap halaman juga user dapat menambahkan data baru.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
