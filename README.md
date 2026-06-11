# Website Portfolio RY Project
## 📌 Deskripsi Project

Website portfolio. Website ini menampilkan informasi profil, portfolio project, dan kontak yang dapat dikelola melalui halaman admin.

## 🎯 Fitur yang Tersedia

| Fitur | Keterangan |
|-------|-------------|
| **Landing Page** | Halaman utama dengan animasi audio wave dan model 3D interaktif |
| **Tentang Saya** | Menampilkan foto profile, deskripsi diri, dan download CV |
| **Portfolio** | Galeri project sound engineering (Live Sound, Studio Mix, Event) |
| **Kontak** | Informasi kontak lengkap (Email, WA, Instagram, YouTube, LinkedIn) |
| **Login Admin** | Sistem autentikasi untuk mengelola konten website |
| **CRUD Portfolio** | Admin dapat menambah, edit, dan menghapus project |
| **Model 3D** | Menampilkan model 3D tubuh (format .glb) yang bisa di-drag dan di-rotate |
| **AI Chatbot** | 🤖 Asisten virtual di pojok kiri atas |

## 🤖 Fitur AI Chatbot

### Cara Menggunakan:
1. Klik tombol **💬** di pojok kiri atas
2. Ketik pertanyaan seperti "Siapa pemilik website?"
3. Bot akan menjawab otomatis

### Contoh Pertanyaan:
- "Ceritakan tentang dirimu"
- "Apa saja portfolio-nya?"
- "Bagaimana cara kontak?"
- "Teknologi apa yang dipakai?"


## 🛠️ Teknologi yang Digunakan

- **Laravel 10** - Backend framework
- **Tailwind CSS** - Styling website
- **Three.js** - Render model 3D
- **SQLite** - Database
- **Laravel Breeze** - Sistem autentikasi

## 📂 Struktur Database

| Tabel | Fungsi |
|-------|--------|
| `profiles` | Menyimpan nama, title, bio, foto, model 3D, CV |
| `portfolios` | Menyimpan data project (judul, kategori, deskripsi, gambar, client, tanggal) |
| `contacts` | Menyimpan kontak (email, phone, wa, ig, youtube, linkedin, alamat) |
| `users` | Menyimpan akun admin (dari Laravel Breeze) |

## 🔐 Hak Akses

| Role | Hak Akses |
|------|-----------|
| **Admin** | Login, mengubah profile, mengelola portfolio, mengelola kontak |
| **Pengunjung** | Melihat semua halaman (tanpa login) |

## 📱 Tampilan Website

### Halaman Utama (Home)
- Hero section dengan typing animation
- Model 3D interaktif di sisi kanan
- Tombol navigasi ke portfolio dan kontak

### Halaman About
- Foto profile
- Deskripsi panjang tentang diri
- Tombol download CV

### Halaman Portfolio
- Grid card project
- Setiap card menampilkan gambar, kategori, judul, client, dan tanggal
- Klik card untuk melihat detail project

### Halaman Kontak
- Menampilkan semua kontak yang sudah diisi admin
- Icon modern menggunakan Font Awesome
- Link langsung ke WhatsApp, Instagram, YouTube, dll

### Halaman Admin
- **Profile:** Upload foto, model 3D, CV, edit bio
- **Portfolio:** Tambah/edit/hapus project
- **Contact:** Edit semua informasi kontak

## 🎨 Tema Website

- **Warna utama:** Hitam (#000000) dan Biru Muda (#38bdf8)
- **Font:** Poppins
- **Background:** Animasi audio wave di hero section
- **Responsif:** Mendukung desktop, tablet, dan mobile

## 🖼️ Model 3D

Model 3D yang digunakan berformat `.glb`.  
Sumber model dapat dari:
- Ready Player Me (avatar gratis)
- Sketchfab (filter free download)

Cara upload:
1. Login sebagai admin
2. Buka halaman Admin → Profile
3. Upload file .glb pada bagian Model 3D

## 👤 Contoh Akun Admin

| Field | Value |
|-------|-------|
| Email | admin@admin.com |
| Password | password123 |

> *Password dapat diubah melalui halaman profile setelah login*


## 📞 Kontak Pembuat

- **Nama:** Christopher Ryan Johnson
- **Email:** rynz3060@gmail.com
- **Instagram:** @nna.yrrr

---

**Dibuat untuk memenuhi tugas portfolio pribadi.**
