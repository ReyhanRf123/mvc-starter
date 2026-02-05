# PHP MVC Starter (Native PHP)

Project ini adalah implementasi **MVC + Service Layer + Security**
menggunakan **PHP native (tanpa framework)** dengan tujuan
mempersiapkan diri masuk ke Laravel.

---

## Fitur

- MVC Architecture
- Custom Router
- Service Layer
- Authentication (Login & Register)
- Authorization (Admin / User)
- Session-based Auth
- Password Hashing
- CSRF Protection
- Flash Message
- Validation
- PDO (MySQL)
- PSR-4 Autoload (Composer)

---

## Struktur Folder

app/
├── Controllers
├── Models
├── Services
├── Helpers
├── Views
├── Core
public/
vendor/


---

## Instalasi

1. Clone repository
2. Jalankan:
   ```bash
   composer dump-autoload

    Buat database:

    CREATE DATABASE mvc_starter;

    Import tabel users

    Atur BASE_URL di public/index.php

    Akses:

    http://localhost/mvc-starter/public

 Akun Admin (Demo)

Email: admin@mail.com
Password: 123

Tujuan Project

Project ini dibuat untuk:

    Memahami cara kerja framework PHP

    Tidak kaget saat masuk Laravel

    Memahami MVC, Auth, Session, Security dari dasar
