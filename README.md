# Laravel Project Installation Guide (Windows)

This project is built with Laravel 12 and uses Laravel Breeze (Blade version) with Vite for frontend assets.

---

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+
- npm
- MySQL / SQLite (or another supported database)
- Laravel Herd for Windows (optional)

---

# Option 1 — Running with Laravel Herd (Windows)

## 1. Install and Start Herd

Make sure Laravel Herd is installed and running.

Place the project inside your Herd directory (usually something like):

```
C:\Users\YourName\Herd
```

Example:

```
C:\Users\YourName\Herd\my-project
```

Herd will automatically make it available at:

```
http://my-project.test
```

---

## 2. Install PHP Dependencies

Open terminal in the project folder and run:

```bash
composer install
```

---

## 3. Environment Setup

If `.env` does not exist:

```bash
copy .env.example .env
php artisan key:generate
```

---

Configure MySQL server

---

Update database credentials inside `.env`.

Example for MySQL:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

Run migrations:

```bash
php artisan migrate
```

---

Launch seeders

```bash
php artisan db:seed
```

---

## 4. Install Frontend Dependencies

```bash
npm install
```

---

## 5. Start Vite Development Server

```bash
npm run dev
```

---

## 6. Open the Project

Open in browser:

```
http://my-project.test
```

> When using Herd, you do NOT need to run `php artisan serve`.

---

To log in, use:
```
email - admin@example.com
password - password
```

---

# Option 2 — Running Without Herd (Windows)

## 1. Install Dependencies

```bash
composer install
npm install
```

---

## 2. Environment Setup

```bash
copy .env.example .env
php artisan key:generate
php artisan migrate
```

---

## 3. Start Development Servers

Run everything with:

```bash
composer run dev
```

Or manually in two terminals:

```bash
php artisan serve
```

and

```bash
npm run dev
```

---

## 4. Open in Browser

If using `php artisan serve`, open:

```
http://127.0.0.1:8000
```

---

To log in, use:
```
email - admin@example.com
password - password
```

---

# Production Build

To build frontend assets for production:

```bash
npm run build
```

---
