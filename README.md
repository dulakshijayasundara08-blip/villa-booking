# Green Valley Villa: Villa Booking Website

A business website for a villa / homestay, built with the **Laravel** framework for the internship assignment "Business Website Development Using Laravel Framework".

Guests can look at rooms, send booking requests, write reviews and contact the villa. The villa owner (admin) can manage rooms, bookings and messages from a separate admin panel.

## Features

**Public pages**
- Home, Rooms, Room details, About and Contact pages
- Booking request form with an automatic price estimate (nights x price per night)
- Guest reviews with star ratings
- Contact form with Google Map and FAQ

**Customer account**
- Register, login and logout
- "My Dashboard" page to track booking requests (Pending, Approved, Rejected)

**Admin panel** (admin users only)
- Dashboard with totals, latest bookings and latest messages
- Rooms: add, edit and delete
- Bookings: approve or reject (a room cannot be approved twice for the same dates)
- Messages: read, mark as read and delete

## Technologies

- Laravel (PHP), Blade templates
- MariaDB database
- Tailwind CSS and Vite
- Laravel Breeze (starter kit used only for the login, register and logout system)

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MariaDB (or MySQL)

## How to run the project

1. Download the project and open the folder in a terminal:
   ```bash
   git clone https://github.com/dulakshijayasundara08-blip/villa-booking.git
   cd villa-booking
   ```

2. Install the PHP and JavaScript packages:
   ```bash
   composer install
   npm install
   ```

3. Create the environment file and the app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Create an empty database named `villa_booking` in MariaDB:
   ```sql
   CREATE DATABASE villa_booking;
   ```

5. Create the tables and add the sample data (admin user and 4 rooms):
   ```bash
   php artisan migrate --seed
   ```

6. Build the design files:
   ```bash
   npm run build
   ```

7. Start the website:
   ```bash
   php artisan serve
   ```
   Open **http://127.0.0.1:8000** in the browser.

After login, the admin goes to the admin panel (`/admin`). Customers can create their own account on the Register page.

## Project structure

| Folder | What is inside |
|---|---|
| `app/Http/Controllers` | Controllers for the public pages and the customer account |
| `app/Http/Controllers/Admin` | Controllers for the admin panel |
| `app/Http/Middleware` | `EnsureUserIsAdmin` (only admins can open admin pages) |
| `app/Models` | Room, Booking, Review, ContactMessage, User |
| `database/migrations` | Table definitions |
| `database/seeders` | Admin user and sample rooms |
| `resources/views` | Blade pages (public, auth, account, admin, layouts) |
| `routes/web.php` | All website routes |
| `public/images` | Photos used on the website |

## Notes

- Login, register and logout were created with Laravel Breeze, the official Laravel starter kit. All other features (rooms, bookings, reviews, contact messages, admin panel, customer dashboard, pages and design) were developed by me.
- Change the demo admin password after the first login.
