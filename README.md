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
3. Lakukan konfigurasi dengan mengubah file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database.
    ```bash
    ...

    DB_CONNECTION=mysql
    DB_HOST={HOST_DATABASE}
    DB_PORT={PORT_DATABASE}
    DB_DATABASE=db_sim_tazma_optik_2023
    DB_USERNAME={USERNAME_DATABASE}
    DB_PASSWORD={PASSWORD_DATABASE}

    ...
    ```

4. Lakukan migrasi database.
    ```bash
    php artisan migrate:fresh
    php artisan db:seed
    ```
5. Jalankan aplikasi.
    ```bash
    php artisan serve
    ```
6. Buka aplikasi di browser dengan alamat `http://localhost:8000`.
