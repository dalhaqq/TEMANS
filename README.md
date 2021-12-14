# Instalasi

Pastikan composer sudah terinstall di komputer.

Jalankan perintah `composer update` dan salin file .env.example dengan nama .env
```bash
composer update
cp .env.example .env
```

Edit file .env sesuai konfigurasi database

Jalankan perintah berikut untuk inisialisasi aplikasi dan migrasi database

```bash
php artisan key:generate
php artisan migrate --seed
```

Jalankan server

```bash
php artisan serve
```

Buka http://localhost:8000

Login dengan kredensial berikut
|Role|Email|Password|
|---|---|---|
|Tenant|delvi.assary@mhs.unsoed.ac.id|delvifa|
|Operator|maria.chasanah@mhs.unsoed.ac.id|mariauc|
|Owner|abdalhaqq.saih@mhs.unsoed.ac.id|abdalhaqqms|
