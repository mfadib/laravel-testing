# Nama Proyek Laravel 9

Ini adalah proyek Laravel 9 yang sudah disiapkan di Git. Berikut adalah langkah-langkah untuk menginstalasi dan menjalankan proyek ini.

## Langkah Instalasi

1. **Clone Repositori**

```shell
git clone https://github.com/mfadib/laravel-testing
```
2. **Instal Dependencies**

Jalankan perintah berikut untuk menginstal dependencies proyek:

```shell
composer install
```
3. **Buat database baru**
Buatlah database dengan nama "laravel" di mysql dengan 
autentikasi user=root dan password=[empty]

4. **Konfigurasi Env**

Salin file .env.example dan ubah namanya menjadi .env. Sesuaikan pengaturan lingkungan seperti pengaturan basis data dan konfigurasi lain yang diperlukan.

```shell
cp .env.example .env
```
5. **Generate Key Aplikasi**

Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

```shell
php artisan key:generate
```
6. **Migrasi dan Penyiapan Basis Data**

Jalankan migrasi dan penyiapan basis data dengan perintah berikut:

```shell
php artisan migrate --seed
```
7. **Menjalankan Storage Link**
Jalankan perintah untuk membuat shortcut difolder storage dengan cara
```shell
php artisan storage:link
```

8. **Menjalankan Proyek**
Untuk menjalankan proyek Laravel, gunakan perintah berikut:

```shell
php artisan serve
```
Proyek Laravel akan dijalankan pada URL default http://localhost:8000.