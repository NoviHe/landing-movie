# NviReview - Landing Movie & TV Series Streaming Platform

[![PHP Version](https://img.shields.io/badge/PHP-8.5.12-777bb4.svg?style=flat-square&logo=php)](https://www.php.net/)
[![Architecture](https://img.shields.io/badge/Architecture-Custom%20MVC-brightgreen.svg?style=flat-square)]()
[![API](https://img.shields.io/badge/API-TMDB%20v3-01d277.svg?style=flat-square)](https://www.themoviedb.org/)
[![License](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)]()

Aplikasi web portal film dan serial TV berbasis **Custom PHP MVC Framework** yang ringan, cepat, dan siap digunakan sebagai portal streaming maupun *affiliate / CPA landing page*. Aplikasi ini telah dimigrasikan secara penuh untuk kompatibilitas **PHP 8.5.12** tanpa *error*, *warning*, maupun *deprecation notice*.

---

## 📌 Daftar Isi
- [Fitur Utama](#-fitur-utama)
- [Struktur Direktori](#-struktur-direktori)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi dan Konfigurasi](#-instalasi-dan-konfigurasi)
- [Cara Menjalankan](#-cara-menjalankan)
- [Rincian Rute & Halaman](#-rincian-rute--halaman)
- [Catatan Migrasi PHP 8.5.12](#-catatan-migrasi-php-8512)
- [Lisensi](#-lisensi)

---

## 🚀 Fitur Utama

### 1. Katalog Film & Serial TV (TMDB API v3)
- **Film**: Menampilkan daftar film *Now Playing*, *Popular*, *Top Rated*, dan *Upcoming*.
- **Serial TV**: Menampilkan serial *Popular*, *Airing Today*, dan *On The Air*.
- **Detail Serial Lengkap**: Navigasi multi-season dan daftar episode lengkap beserta ringkasan sinopsis dan tanggal rilis tiap episode.
- **Filter Berdasarkan Genre**: Kategori lengkap (Action, Adventure, Animation, Comedy, Crime, Documentary, Drama, Family, Fantasy, History, Horror, Music, Mystery, Romance, Sci-Fi, Thriller, War, Western).
- **Pencarian Cerdas**: Pencarian real-time untuk judul film dan serial TV.

### 2. Antarmuka Streaming & Pemutar Video
- Integrasi video player (mendukung embed pihak ketiga seperti `filmku.online`, `2embed.cc`, iframe kustom, atau file video lokal).
- Informasi metadata lengkap: poster backdrop, rating bintang interaktif, jumlah vote, durasi film, bintang/pemeran (cast), perusahaan produksi, dan deskripsi/sinopsis.
- Bagian download multi-resolusi (MKV & MP4 untuk resolusi 360p, 480p, 720p, 1080p).
- Modal aktivasi & pendaftaran interaktif untuk peningkatan konversi penonton.

### 3. Sistem CPA / Affiliate & Flow Landing Page
- Flow pengalihan cerdas untuk kampanye CPA/Afiliasi:
  - `/loading` & `/processing`
  - `/register` & `/request`
  - `/winner`
  - *Content locker page* (contoh: halaman kampanye Manny Pacquiao).
- Dukungan *geo-targeting* negara (redirection otomatis berdasarkan *country code* seperti ID, MY, MX, RU ke offer link cadangan).
- Tombol CTA yang siap dikonfigurasi: *"Subscribe to Watch"*, *"Watch Now"*, *"Download"*, dan *"Create Free Account"*.

### 4. Admin Panel & Visual Page Builder
- Modul autentikasi admin (`/login`).
- Dashboard manajemen (`/admin`).
- **Visual Page Builder**: Pembuat halaman visual menggunakan **Rich Text Editor** (`jquery.richtext`), mendukung kustomisasi teks header, gambar upload/URL, isi body, serta pembuatan tombol CTA kustom (tipe `<button>` atau `<a>`, event onclick, target link, dan styling).

### 5. Optimasi SEO & Caching Mandiri
- **File-based JSON Caching System**: Penyimpanan cache lokal di `public/cache/` (home, movie, tv, single, genre) dengan TTL otomatis guna meminimalkan konsumsi kuota request TMDB API dan mempercepat response time.
- **Dynamic XML Sitemaps**:
  - `/sitemap.xml`: Sitemap induk
  - `/sitemap/post`: Sitemap berbasis posting/film terindeks
  - `/sitemap/search`: Sitemap kata kunci pencarian otomatis
- **OpenGraph & Media Meta Tags**: Meta title, description, Facebook Admin/App ID, dan OpenGraph images dinamis untuk pratinjau media sosial.
- **Halaman Legalitas**: Halaman DMCA Notice, Kebijakan Privasi (*Privacy Policy*), dan Kontak (*Contact Us*).

---

## 📂 Struktur Direktori

```text
landing-movie/
├── application/
│   ├── api/
│   │   └── tmdb.api.php                  # Client API wrapper TMDB v3
│   ├── controllers/
│   │   ├── admin/                        # Controller khusus modul admin
│   │   │   ├── AdminMainController.php
│   │   │   ├── BuilderController.php
│   │   │   └── DashboardController.php
│   │   ├── AdminController.php
│   │   ├── HomeController.php
│   │   ├── LoadingController.php
│   │   ├── LoginController.php
│   │   ├── MainController.php
│   │   ├── MovieController.php
│   │   ├── NvireviewController.php
│   │   ├── ProcessingController.php
│   │   ├── RegisterController.php
│   │   ├── RequestController.php
│   │   ├── SearchController.php
│   │   ├── SitemapController.php
│   │   ├── TvController.php
│   │   └── WinnerController.php
│   ├── functions/
│   │   ├── functions_html.php            # Helper asset, URL slug, SEO, cache
│   │   └── functions_template.php        # Helper navigasi template
│   ├── models/
│   │   └── admin.model.php               # Model database admin
│   └── views/                            # Template antarmuka pengguna
│       ├── admin/                        # View halaman administrasi & builder
│       ├── locker/                       # View landing page khusus / locker
│       ├── movies/                       # View daftar film berdasarkan status
│       ├── page/                         # View halaman statis (DMCA, Privacy, dll)
│       ├── search/                       # View hasil pencarian
│       ├── sitemap/                      # View template XML sitemap
│       ├── tv/                           # View daftar serial TV
│       ├── 404.view.php
│       ├── category.view.php
│       ├── index.view.php
│       ├── movie.view.php
│       ├── template.view.php             # Master layout utama
│       └── tv.view.php
├── config/
│   ├── config.php                        # Konfigurasi sistem, DB, dan link offer
│   └── option.php                        # Konfigurasi API Key TMDB & opsi rute
├── library/
│   ├── controller.class.php              # Base controller MVC
│   ├── model.class.php                   # Base model MySQLi
│   ├── tmdb.class.php                    # HTTP request client TMDB
│   └── view.class.php                    # View rendering engine
├── public/                               # Document root web publik
│   ├── cache/                            # File cache JSON
│   ├── css/                              # Stylesheet CSS
│   ├── js/                               # Skrip JavaScript
│   ├── images/                           # Asset grafis dan ikon
│   ├── .htaccess                         # URL rewrite Apache
│   └── index.php                         # Front controller entry point
├── tmp/
│   └── log/
│       └── error.log                     # Log error aplikasi
├── .gitignore
├── .htaccess
└── README.md
```

---

## 💻 Persyaratan Sistem

- **PHP**: Versi **8.5.x** (Kompatibel penuh PHP 8.0 - 8.5.12)
- **Ekstensi PHP**:
  - `curl` (Koneksi TMDB API)
  - `mbstring` (Manipulasi string UTF-8 dan slug transliteration)
  - `mysqli` (Koneksi database MySQL/MariaDB)
  - `json` (Parsing JSON)
  - `openssl` (Koneksi HTTPS aman)
- **Web Server**: Apache (dengan ekstensi `mod_rewrite` aktif), Nginx, atau PHP Built-in Server.
- **Database**: MySQL 5.7+ / MariaDB 10.3+ (diperlukan untuk login admin).

---

## ⚙️ Instalasi dan Konfigurasi

### 1. Clone Repository
```bash
git clone https://github.com/NoviHe/landing-movie.git
cd landing-movie
```

### 2. Konfigurasi Sistem & Database
Buka file [`config/config.php`](file:///config/config.php) dan sesuaikan parameter berikut:
```php
define('DEVELOPMENT_ENVIRONMENT', false); // true untuk mode debug, false untuk produksi

// URL & Domain
define('BASE_PATH', 'https://domainanda.com');
define('URL_WEBSITE', 'https://domainanda.com');

// Konfigurasi Database
define('DB_NAME', 'db_novi');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password_anda');
define('DB_HOST', 'localhost');

// Pengaturan Link Afiliasi / Offer CPA
define('OFFER_LINK1', 'https://link-offer-pertama.com/?sub1=');
define('OFFER_LINK2', 'https://link-offer-kedua.com/?sub1=');
define('HISTATS_ID', '4802318');
```

### 3. Konfigurasi API Key TMDB
Buka file [`config/option.php`](file:///config/option.php) dan masukkan API key TMDB Anda:
```php
// Dapat berupa satu API key atau dipisahkan koma untuk rotasi otomatis
define('API_KEY', 'api_key_tmdb_anda');
```

---

## 🖥️ Cara Menjalankan

### Menggunakan PHP Built-in Server (Development)
Arahkan document root ke direktori `public`:
```bash
php -S 127.0.0.1:8000 -t public
```
Akses di browser melalui: `http://127.0.0.1:8000`

### Menggunakan Apache (Laragon / XAMPP)
- Pastikan modul `rewrite_module` aktif di Apache.
- Pastikan document root atau VirtualHost diarahkan ke folder `landing-movie/public` (atau folder root dengan `.htaccess` aktif).

### Menggunakan Nginx
Konfigurasikan Nginx dengan *try_files* menuju `index.php`:
```nginx
server {
    listen 80;
    server_name domainanda.com;
    root /path/to/landing-movie/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?url=$uri&$args;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

---

## 🗺️ Rincian Rute & Halaman

| Rute URL | Controller & Action | Keterangan |
| :--- | :--- | :--- |
| `/` atau `/home` | `HomeController@index` | Halaman beranda (film & tv populer, now playing, dll.) |
| `/movie/popular` | `MovieController@popular` | Daftar film populer |
| `/movie/now_playing` | `MovieController@now_playing` | Daftar film yang sedang tayang |
| `/movie/top_rated` | `MovieController@top_rated` | Daftar film berating tertinggi |
| `/movie/up_coming` | `MovieController@up_coming` | Daftar film yang akan segera tayang |
| `/movie/watch/{id}/{slug}.html` | `MovieController@watch` | Halaman streaming & detail film |
| `/tv/popular` | `TvController@popular` | Daftar serial TV populer |
| `/tv/airing_today` | `TvController@airing_today` | Serial TV yang tayang hari ini |
| `/tv/on_the_air` | `TvController@on_the_air` | Serial TV yang sedang mengudara |
| `/tv/watch/{id}/{slug}.html` | `TvController@watch` | Halaman streaming & navigasi episode serial TV |
| `/home/genre/{id}/{name}` | `HomeController@genre` | Filter film berdasarkan kategori genre |
| `/search?s={query}` | `SearchController@index` | Hasil pencarian film & serial TV |
| `/search/movies?s={query}` | `SearchController@movies` | Hasil pencarian khusus film |
| `/search/tv?s={query}` | `SearchController@tv` | Hasil pencarian khusus serial TV |
| `/sitemap.xml` | `SitemapController@index` | XML Sitemap utama |
| `/sitemap-post.xml` | `SitemapController@post` | XML Sitemap artikel / film terindeks |
| `/sitemap-0.xml` | `SitemapController@search` | XML Sitemap kata kunci pencarian |
| `/admin` | `AdminController@index` | Dashboard administrator |
| `/admin/builder` | `AdminController@builder` | Page Builder pembuat landing page |
| `/login` | `LoginController@index` | Halaman login admin |
| `/loading`, `/processing` | `LoadingController`, `ProcessingController` | Halaman loading CPA/afiliasi |
| `/home/dmca_notice` | `HomeController@dmca_notice` | Halaman kepatuhan DMCA |
| `/home/privacy_policy` | `HomeController@privacy_policy` | Kebijakan Privasi |
| `/home/contact_us` | `HomeController@contact_us` | Halaman Kontak |

---

## 🛠️ Catatan Migrasi PHP 8.5.12

Kode aplikasi telah disesuaikan agar berjalan tanpa peringatan maupun error pada PHP 8.5.12:

1. **`#[\AllowDynamicProperties]`**: Ditambahkan pada seluruh class controller, model, dan view untuk memenuhi standar PHP 8.2+.
2. **Depresiasi `curl_close()`**: Pada PHP 8.5, pemanggilan fungsi `curl_close()` sudah tidak lagi memiliki efek dan memicu deprecation notice. Dihapus dan digantikan pelepasan memori otomatis oleh PHP runtime.
3. **Pembersihan `mb_convert_encoding()`**: Menghapus opsi *HTML-ENTITIES* yang usang dan distandarkan ke UTF-8.
4. **Proteksi Parameter Non-Nullable**: Mengantisipasi error saat string fungsi internal (`trim`, `explode`, `strip_tags`, `strtotime`) menerima nilai `null`.
5. **Penanganan Error MySQLi**: Koneksi dan query MySQLi dibungkus `try-catch` dengan `MYSQLI_REPORT_OFF` agar tidak menimbulkan fatal exception jika server database offline.
6. **Verifikasi Array Unserialize**: Seluruh view melakukan verifikasi struktur array sebelum mengakses data hasil cache.

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah lisensi [MIT](LICENSE). Silakan gunakan dan kembangkan sesuai kebutuhan Anda.
