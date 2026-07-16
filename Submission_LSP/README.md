# SI-PEKA (Sistem Pendaftaran Klinik)

SI-PEKA adalah aplikasi berbasis web yang dirancang untuk memudahkan pasien dalam melakukan pendaftaran pemeriksaan klinik secara online dan mandiri. Sistem ini juga memiliki fitur verifikasi oleh admin terkait pendaftaran akun, jadwal pemeriksaan, dan pembayaran.

## 🚀 Fitur Utama (Use Case)

### Aktor: Pasien
- ✅ **Melakukan pendaftaran akun:** Registrasi akun dengan profil lengkap pasien.
- ✅ **Melihat status pendaftaran akun:** Pasien tidak dapat mengakses fitur utama sebelum akun diverifikasi oleh Admin.
- ✅ **Login ke aplikasi:** Sistem autentikasi aman.
- ✅ **Melakukan pendaftaran pemeriksaan:** Menentukan jadwal dan menyampaikan keluhan.
- ✅ **Melihat status pendaftaran pemeriksaan:** Tracking status pengajuan periksa (Pending, Diterima, Selesai, Ditolak).
- ✅ **Melakukan konfirmasi pembayaran:** Mengunggah bukti bayar secara mandiri setelah pendaftaran diterima.
- ✅ **Melihat pengumuman:** Mendapatkan informasi terbaru dari pihak klinik, dilengkapi gambar.

### Aktor: Admin
- ✅ **Login ke aplikasi:** Akses ke Dashboard khusus Admin.
- ✅ **Memverifikasi pendaftaran akun:** Menerima atau menolak pendaftaran akun pasien baru.
- ✅ **Memverifikasi pendaftaran pemeriksaan:** Mengelola antrean pemeriksaan.
- ✅ **Memverifikasi pembayaran:** Mengecek validitas bukti bayar yang diunggah pasien.
- ✅ **Mengelola pengumuman:** Operasi CRUD penuh (menambah, mengubah, menghapus) pada pengumuman yang dapat dilihat oleh pasien.

---

## 🛠 Spesifikasi Teknologi & Dependensi
Aplikasi ini dikembangkan memenuhi kriteria spesifikasi berikut:
- **Framework Backend:** Laravel 13 (PHP >= 8.3)
- **Database:** MySQL
- **CSS Framework:** Tailwind CSS
- **Otentikasi & Otorisasi:** Menggunakan sistem Auth bawaan Laravel yang dikustomisasi dengan Role Middleware (`admin`, `pasien`).
- **Penyimpanan Multimedia:** Menggunakan Storage system Laravel untuk pengumuman dan bukti pembayaran.
- **Version Control:** Git & GitHub

---

## 📦 Panduan Instalasi (Local Development)

Ikuti langkah-langkah di bawah ini untuk menjalankan project SI-PEKA di komputer lokal Anda.

### Persyaratan Sistem
- PHP >= 8.3
- Composer
- MySQL Database (XAMPP/Laragon/DBngin)
- Node.js & NPM 

### Langkah Instalasi
1. **Clone repositori**
   ```bash
   git clone https://github.com/username/si-peka.git
   cd si-peka
   ```

2. **Install Dependensi Composer**
   ```bash
   composer install
   ```

3. **Install Npm**
   ```bash
   Npm install
   ```

4. **Konfigurasi Environment**
   Duplikat file `.env.example` menjadi `.env`:
   ```bash
   copy .env.example .env
   ```
   Atur koneksi database Anda di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=si_peka
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Migrasi Database dan seeding**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Buat Symlink Storage**
   Digunakan agar gambar pengumuman dan bukti pembayaran dapat diakses melalui URL.
   ```bash
   php artisan storage:link
   ```

8. **Jalankan Npm**
   ```bash
   npm run dev
   ```

8. **Jalankan Local Server**
   ```bash
   php artisan serve
   ```
   Sistem dapat diakses di URL: `http://localhost:8000`

---

## ⚠️ Penanganan Masalah (Alerts)
Sistem ini menggunakan Tailwind Alert (Notifikasi) untuk menangani berbagai permasalahan, seperti:
- Gagal login karena akun belum diverifikasi Admin.
- Validasi form (misal input kurang tepat).
- Berhasil menambahkan, mengedit, atau menghapus data (Flash messages).
- Upaya akses halaman yang tidak diizinkan (Unauthorized action).

## 📄 Struktur Tabel Utama
Aplikasi ini berjalan dengan minimal tabel berikut (ditambah tabel bawaan Laravel):
1. **users** (Data kredensial dan role pengguna)
2. **patient_profiles** (Data spesifik detail pasien)
3. **account_registrations** (Manajemen verifikasi akun)
4. **pemeriksaans** (Data pengajuan jadwal pemeriksaan)
5. **payments** (Bukti konfirmasi pembayaran pemeriksaan)
6. **announcements** (Data pengumuman dari admin)
7. **Doctors** (Data dokter)
8. **schedules** (Data jadwal dokter)
