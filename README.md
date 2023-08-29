# Informasi Proyek

## Deskripsi
Repositori ini digunakan untuk menyimpan proyek Sistem Informasi Manajemen Tazma Optik.

# Inisialisasi Proyek

## Instalasi
1. Clone repositori ini ke komputer lokal.
2. Lakukan instalasi modul sebagai berikut.
    ```bash
    composer install
    composer update
    php artisan key:generate
    ```
3. Buat database dengan nama `db_tazma_optik`.
4. Lakukan konfigurasi dengan mengubah file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.
    ```bash
    ...

    DB_CONNECTION=mysql
    DB_HOST={HOST_DATABASE}
    DB_PORT={PORT_DATABASE}
    DB_DATABASE=db_tazma_optik
    DB_USERNAME={USERNAME_DATABASE}
    DB_PASSWORD={PASSWORD_DATABASE}

    ...
    ```

5. Lakukan migrasi dan seeding database.
    ```bash
    php artisan migrate:fresh
    php artisan db:seed
    ```
6. Jalankan server backend.
    ```bash
    php artisan serve --port=8001
    ```
7. Buka aplikasi di browser dengan alamat `http://localhost:8001`.
