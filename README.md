# Proyek Sekawan Media

## Daftar Username dan Password

- **Admin**
  - Username: `Siska`
  - Password: `password1`

- **User**
  - Username: `Margaret`
  - Password: `password2`

  - Username: `Naufal`
  - Password: `password3`

## Versi yang Digunakan

### 1. Versi phpMyAdmin
- **phpMyAdmin**: `5.2.1`

### 2. Versi PHP
- **PHP**: `8.2.12`

### 3. Versi Laravel
- **Laravel**: `11.36.1` (Terbaru)

### 4. Versi Tailwind CSS
- **Tailwind CSS**: `3.4.17` (Terbaru)

## Persyaratan

Pastikan perangkat Anda memiliki versi PHP, MySQL, dan Laravel yang sesuai dengan yang tercantum di atas untuk menjalankan proyek ini dengan lancar.
Pastikan juga memmiliki web server yang kompatibel (direkomendasikan menggunakan XAMPP)

## Langkah-Langkah Instalasi

1. Clone repository ini:

   ```bash
   git clone <URL_REPOSITORY>
   cd <NAMA_FOLDER_PROYEK>
   ```

2. Instal dependensi PHP menggunakan Composer:

   ```bash
   composer install
   ```

3. Instal dependensi frontend menggunakan npm atau yarn:

   ```bash
   npm install
   # atau gunakan yarn
   yarn install
   ```

4. Salin file `.env.example` ke `.env` dan konfigurasi file `.env` sesuai dengan kebutuhan:

   ```bash
   cp .env.example .env
   ```

   - Atur pengaturan database:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nama_database
     DB_USERNAME=username_database
     DB_PASSWORD=password_database
     ```

5. Generate application key:

   ```bash
   php artisan key:generate
   ```

6. Jalankan migrasi untuk membuat tabel di database:

   ```bash
   php artisan migrate
   ```

7. Jika ada data awal yang perlu dimasukkan, jalankan seeder:

   ```bash
   php artisan db:seed
   ```

8. Compile aset frontend dengan Tailwind CSS:

   ```bash
   npm run dev
   # atau untuk mode produksi
   npm run build
   ```

## Menjalankan Proyek

1. Jalankan server Laravel:

   ```bash
   php artisan serve
   ```

2. Akses aplikasi melalui browser di:

   ```
   http://127.0.0.1:8000
   ```

## Perintah Penting

- **Menjalankan watcher untuk Tailwind CSS:**

  ```bash
  npm run watch
  ```

- **Membersihkan cache Laravel:**

  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

- **Memperbarui dependensi frontend:**

  ```bash
  npm update
  ```

# Panduan Penggunaan Aplikasi Pemesanan Kendaraan Perusahaan

## Deskripsi Aplikasi
Aplikasi ini dirancang untuk membantu karyawan dalam memesan kendaraan perusahaan dengan mudah dan efisien. Fitur utama meliputi pemesanan kendaraan, pengingat jadwal servis, pelacakan biaya konsumsi BBM, dan pembuatan laporan periodik pemesanan kendaraan perusahaan.

---

## Cara Menggunakan Aplikasi

### 1. **Login ke Aplikasi**
- Masukkan **username** dan **kata sandi** pada halaman login.
- Klik tombol **Login** untuk masuk ke dashboard.

### 2. **Melihat Daftar Kendaraan**
- Setelah login, Anda akan diarahkan ke halaman dashboard.
- Klik menu **Vehicle** untuk melihat daftar kendaraan yang tersedia.
- Setiap kendaraan memiliki informasi detail seperti jenis, konsumsi BBM, dan status ketersediaan.

### 3. **Memesan Kendaraan**
1. Klik menu **Booking** di sidebar.
2. Isi formulir pemesanan
3. Klik tombol **Save** untuk mengirim permintaan pemesanan.
4. Kendaraan anda akan melalui proses persetujuan oleh tingkat atas.

### 4. **Melihat Daftar Driver**
- Klik menu **Driver** untuk melihat daftar driver yang tersedia.

### 5. **Melihat Grafik**
- Klik menu **Dashboard**
- Atur rentang tanggal yang ingin dilihat
- Klik tombol **Update**
- Line Chart akan ditampilkan

---

## Fitur Tambahan

### a. **Laporan Penggunaan Kendaraan**
- Buka menu **Dashboard**.
- Anda dapat melihat laporan pemakaian kendaraan secara bulanan atau mingguan dengan menekan tombol **Export**.

### b. **Pengelolaan Kendaraan**
- Admin dapat menambah kendaraan, user, atau driver melalui menu **Sidebar**.

### c. **Pengingat Jadwal**
- Pengingat akan dikirimkan kepada pengguna beberapa jam sebelum waktu pemakaian kendaraan.

---

## Dokumentasi Tambahan
- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
