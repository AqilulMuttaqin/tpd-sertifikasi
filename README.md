# 📂 Arsip Surat

Aplikasi **Arsip Surat** berbasis web yang dibuat menggunakan **Laravel 11**.  
Proyek ini digunakan untuk menyimpan, mengelola, dan mencari surat yang diarsipkan dalam format **PDF** dengan kategori tertentu.

---

## 🚀 Fitur
- ✉️ **Manajemen Arsip Surat**
  - Tambah surat dengan nomor, judul, kategori, dan file PDF
  - Validasi unik untuk nomor surat
  - File PDF otomatis disimpan dengan nama sesuai nomor surat
- 📑 **Manajemen Kategori Surat**
  - Tambah, edit, hapus, dan cari kategori
- 🔎 **Pencarian Arsip**
  - Cari arsip berdasarkan
- 👤 **Halaman About**
  - Informasi pembuat aplikasi

---

## 🛠️ Teknologi yang Digunakan
- [Laravel 11](https://laravel.com/)
- [Blade Template](https://laravel.com/docs/blade)
- [Tailwind CSS](https://tailwindcss.com/) + [Flowbite](https://flowbite.com/)
- MySQL / MariaDB

---

## 📂 Struktur Database
### Tabel `tb_kategori`
| Kolom       | Tipe Data    | Keterangan              |
|-------------|--------------|-------------------------|
| id          | BIGINT (PK)  | Primary key             |
| nama        | VARCHAR(255) | Nama kategori surat     |
| keterangan  | VARCHAR(255) | Keterangan kategori     |

### Tabel `tb_arsip`
| Kolom        | Tipe Data    | Keterangan                     |
|--------------|--------------|--------------------------------|
| id           | BIGINT (PK)  | Primary key                    |
| no_surat     | VARCHAR(255) | Nomor surat (unik)             |
| judul_surat  | VARCHAR(255) | Judul surat                    |
| file_surat   | VARCHAR(255) | Nama file PDF                  |
| kategori_id  | BIGINT (FK)  | Relasi ke `tb_kategori`        |
| waktu_upload | TIMESTAMP    | Tanggal surat diunggah         |

---

## ⚙️ Instalasi

1. Clone repository ini:
   ```bash
   git clone https://github.com/AqilulMuttaqin/tpd-sertifikasi.git
   cd tpd-sertifikasi

2. Install dependencies Laravel:
   ```bash
   composer install
   npm install

3. Copy file .env.example menjadi .env dan sesuaikan konfigurasi database:
   ```bash
   cp .env.example .env

4. Generate key Laravel:
   ```bash
   php artisan key:generate

5. Migrasi dan seeder database:
   ```bash
   php artisan migrate
   php artisan db:seed

6. Jalankan Aplikasi
   ```bash
   php artisan serve
   npm run dev

## 👨‍💻 Author
- Muhammad Aqilul Muttaqin
- NIM: 2141720182
- Prodi: D4 Teknik Informatika
