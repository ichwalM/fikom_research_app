# Riset Fikom App

Aplikasi web untuk manajemen data riset dan profil dosen di lingkungan Fakultas Ilmu Komputer. Aplikasi ini dibangun untuk mendata, mengelola, dan menampilkan portofolio akademik para dosen, termasuk data publikasi jurnal, statistik penelitian, dan profil lengkap.

## Deskripsi & Alur Kerja

Aplikasi ini memiliki dua peran utama: **Admin Fakultas** dan **Dosen**.

* **Admin Fakultas** bertindak sebagai pengelola sistem. Admin memiliki hak akses penuh untuk mengelola akun-akun pengguna (dosen), namun tidak mengelola data akademik secara langsung untuk menjaga otonomi data.
* **Dosen** adalah pengguna utama yang dapat login untuk melengkapi profil detail mereka, mengelola daftar publikasi jurnal, dan memasukkan data statistik penelitian mereka.

Tujuan akhir dari aplikasi ini adalah untuk menyajikan data yang terkumpul di halaman publik, berfungsi sebagai etalase atau direktori keahlian dosen di fakultas.

## 🚀 Fitur Utama

### Fitur Umum
* **Sistem Autentikasi:** Sistem login yang aman.
* **Hak Akses Berbasis Peran:** Perbedaan hak akses antara Admin dan Dosen.
* **Desain Responsif:** Layout sidebar kustom yang nyaman digunakan di desktop maupun mobile.
* **Dasbor Dinamis:** Halaman dasbor yang menampilkan statistik visual (grafik publikasi per tahun).

### Fitur Admin Fakultas
* **Manajemen Pengguna (CRUD):** Admin dapat membuat, melihat, mengedit, dan menghapus akun pengguna.
* **Soft Delete & Tong Sampah:** Akun yang dihapus tidak langsung hilang permanen. Admin bisa melihatnya di "Tong Sampah" untuk dikembalikan (`restore`) atau dihapus permanen (`force delete`).

### Fitur Dosen
* **Manajemen Profil Lengkap:** Dosen dapat mengisi dan memperbarui profilnya sendiri, mencakup:
    * Data Pribadi (Nama, Email).
    * Data Detail Dosen (NIDN, Telepon, Alamat, dll).
    * Unggah Foto Profil.
    * Data Identitas Peneliti (Sinta ID, Google Scholar ID).
* **Manajemen Jurnal (CRUD):** Dosen dapat menambah, mengedit, dan menghapus data publikasi jurnal miliknya sendiri.
* **Input Statistik Manual:** Dosen dapat mengisi data statistik Google Scholar (Total Sitasi, H-Index, i10-Index) secara manual.
* **Keamanan Data:** Dosen dijamin tidak bisa melihat atau mengubah data milik dosen lain, berkat implementasi **Laravel Policy**.

## 🛠️ Teknologi yang Digunakan

* **Framework Backend:** Laravel 12
* **Framework Frontend:** Tailwind CSS
* **Database:** MySQL
* **Templating Engine:** Blade
* **JavaScript:**
    * Vite (sebagai *bundler*)
    * Alpine.js (untuk interaktivitas dropdown)
    * Chart.js (untuk visualisasi data di dasbor)
* **Library PHP:** Composer

## ⚙️ Panduan Instalasi

1.  **Clone repository ini:**
    ```bash
    git clone [https://github.com/ichwalM/fikom_research_app.git]
    cd riset_fikom_app
    ```

2.  **Instal dependensi PHP:**
    ```bash
    composer install
    ```

3.  **Instal dependensi JavaScript:**
    ```bash
    npm install
    npm run dev
    ```

4.  **Konfigurasi Lingkungan:**
    * Salin file `.env.example` menjadi `.env`.
        ```bash
        cp .env.example .env
        ```
    * Buat *app key* baru.
        ```bash
        php artisan key:generate
        ```
    * Sesuaikan koneksi database Anda (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) di dalam file `.env`.

5.  **Jalankan Migrasi & Seeder:**
    Perintah ini akan membuat semua tabel database dan mengisi data awal (roles dan akun admin default).
    ```bash
    php artisan migrate:fresh --seed
    ```
    *Akun admin default: `admin@fikom.app` | password: `password`*

6.  **Buat Symbolic Link untuk Storage:**
    ```bash
    php artisan storage:link
    ```

7.  **Jalankan server development:**
    ```bash
    php artisan serve
    ```
    Aplikasi sekarang bisa diakses di `http://127.0.0.1:8000`.