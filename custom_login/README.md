# Jajabor.com Custom Login Project

## Overview

This is a Laravel-based web application that provides a premium, glass‑morphic authentication experience and a dedicated admin panel. The project includes:

- **Custom user login & registration** with a modern UI built using Tailwind CSS and Vite.
- **Separate admin login** (`/admin/login`) with strict access control (`is_admin` flag).
- **Admin dashboard** for managing bookings, flights, hotels, and other resources.
- **Booking management** with relationships to users, flights, and hotels.
- **Database migrations** for users, bookings, hotel bookings, and additional tables.

## Features

- Glass‑morphic design with dark‑mode toggle.
- Admin‑only routes protected by `CheckAdmin` middleware.
- Revenue calculation using a `total_price` column added to bookings.
- Easy creation of admin users via Artisan Tinker.

## Getting Started

### Prerequisites

- PHP 8.2+ with Composer
- Node.js 18+ with npm
- PostgreSQL (or another supported DB) configured in `.env`

### Installation

```bash
# Clone the repository
git clone https://github.com/yourusername/jajabor.com.git
cd jajabor.com/custom_login

# Install PHP dependencies
composer install

# Install frontend dependencies
npm install

# Copy env file and generate app key
cp .env.example .env
php artisan key:generate

# Set up the database and run migrations
php artisan migrate

# Build assets (development)
npm run dev
```

### Running the Application

```bash
php artisan serve
```
Visit `http://localhost:8000` in your browser.

## Admin Access

1. Create an admin user (example):

```bash
php artisan tinker --execute="App\Models\User::updateOrCreate(['email' => 'admin@gmail.com'], ['name' => 'Admin User', 'password' => bcrypt('1234576'), 'is_admin' => true]);"
```

2. Open the admin login page: `http://localhost:8000/admin/login`
3. Use the credentials above to log in and access the admin dashboard (`/admin/dashboard`).

## Project Structure (key directories)

- `app/Http/Controllers/Auth` – Authentication controllers.
- `app/Http/Controllers/Admin` – Admin panel controllers.
- `app/Models` – Eloquent models (`User`, `Booking`, `HotelBooking`, etc.).
- `resources/views/auth` – Blade views for user login/registration.
- `resources/views/auth/admin-login.blade.php` – Admin login view.
- `resources/views/layouts/guest.blade.php` – Guest layout with premium styling.
- `routes/web.php` – Web routes, including admin routes.
- `routes/auth.php` – Authentication routes.
- `database/migrations` – Schema definitions.

## Contributing

Feel free to open issues or submit pull requests. Follow the existing coding style and run tests before submitting changes.

## License

This project is licensed under the MIT License.
