# 🎧 Portfolio Sound Engineer - Christopher Ryan Johnson

Website portfolio. Dibuat dengan Laravel, Tailwind CSS, dan Three.js untuk menampilkan model 3D interaktif.

## ✨ Fitur Utama

- 🎨 **Single Page Website** - Navigasi smooth scroll ke setiap section
- 🎭 **Model 3D Interaktif** - Tampilkan avatar/model 3D tubuh dengan Three.js (drag to rotate, scroll to zoom)
- 📸 **Foto Profile** - Upload foto profile di halaman About
- 🎚️ **Portfolio Management** - CRUD project portfolio (Live Sound, Studio Mix, Event Production)
- 📱 **Contact Information** - Kelola kontak (Email, WA, Instagram, YouTube, LinkedIn)
- 🔐 **Authentication System** - Login admin untuk mengelola konten
- 🎨 **Responsive Design** - Tampilan mobile friendly
- 🌊 **Animasi Background** - Audio wave animation di hero section

## 🛠️ Tech Stack

| Technology | Usage |
|------------|-------|
| Laravel 10 | Backend Framework |
| Tailwind CSS | Styling |
| Three.js | 3D Model Rendering |
| SQLite | Database |
| Laravel Breeze | Authentication |

## 📋 Halaman Website

| Section | Deskripsi |
|---------|-----------|
| **Home / Hero** | Sapaan, title, dan model 3D |
| **About** | Foto profile, bio panjang, download CV |
| **Portfolio** | Gallery project sound engineering |
| **Contact** | Informasi kontak lengkap |

## 🔐 Admin Credential (Default)

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@admin.com | password123 |


## 🚀 Cara Installasi

### Prasyarat
- PHP 8.1+
- Composer
- Node.js & NPM

### Langkah Installasi

```bash
# 1. Clone repository
git clone https://github.com/Christopher-Ryan306/Web-portofolio-christo.git
cd Web-portofolio-christo

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Setup database (SQLite)
touch database/database.sqlite
# Atau buat file database/database.sqlite manual

# 5. Run migration
php artisan migrate

# 6. Buat storage link
php artisan storage:link

# 7. Buat user admin
php artisan tinker
>>> App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@admin.com',
    'password' => bcrypt('password123')
]);
>>> exit

# 8. Jalankan development server
npm run dev
php artisan serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
