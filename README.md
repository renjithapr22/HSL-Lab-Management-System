# 🧬 HSL LAB – Provider & Staff Management System

A Laravel-based application built for **HSL Labs**, enabling role-based access control for **Providers, Staff, and Patients** using **Spatie Laravel Permission**.

---

## 🚀 Features

- Role-based login for Admin, Provider, Staff, and Patient.
- Inventory management (track usage & stock).
- Provider staff management (with login access tied to providers).
- Orders and subscription management.
- Secure authentication with Laravel Breeze / Jetstream.
- Role and permission management using Spatie.

---

## 🧰 Requirements

- PHP 8.1 or higher  
- Composer  
- MySQL / MariaDB  
- Node.js (optional for frontend assets)
- Laravel 10+

---

## ⚙️ Installation Guide

1️⃣ Clone the repository

git remote add origin https://github.com/renjithapr22/HSL-Lab-Management-System.git
git branch -M main
git push -u origin main
cd hsl-lab


2️⃣ Install dependencies
   1.1 composer install
   1.2 npm install && npm run dev

3️⃣ Create the .env file
    Copy the example.env
        cp .env.example .env
    Update your environment details:
        APP_NAME="HSL Lab"
        APP_URL=http://localhost:8000
        DB_DATABASE=hsl_lab
        DB_USERNAME=root
        DB_PASSWORD=

4️⃣ Generate application key
    php artisan key:generate

5️⃣ Run migrations
    I've intregrated two basic `artisan` commands to create and execute migrations. These commands will read and create `.sql`
    files from and to the `{PROJECT_ROOT}migrations` folder.
    Executing migrations use:

      php artisan migrate

6️⃣ Run seeders
    php artisan db:seed
        To Create a seeder for default manufacturer i.e :HSL  - php artisan make:seeder ManufacturerSeeder
        To create default roles and an admin user


## Finally, 🧩 Running the App Locally

php artisan serve

Now visit: http://127.0.0.1:8000


## 🚀 Default credentials

| Role  | Email                                 | Password |
| ----- | ------------------------------------- | -------- |
| Admin | [admin@hsl.com] | password |


## 🧾 Role Assignments
  php artisan tinker
    $user = App\Models\User::first();
    $user->assignRole('admin');
    exit


##  🧹 Maintenance Commands

| Purpose                 | Command                            |
| ----------------------- | ---------------------------------- |
| Clear config cache      | `php artisan config:clear`         |
| Clear route cache       | `php artisan route:clear`          |
| Optimize                | `php artisan optimize:clear`       |
| Refresh DB with seeders | `php artisan migrate:fresh --seed` |



## 🏗 Folder Structure Overview

hsl-lab/
 ├── app/
 │    ├── Models/
 │    ├── Http/
 │    │     ├── Controllers/
 │    │     └── Requests/
 ├── database/
 │    ├── migrations/
 │    └── seeders/
 ├── routes/
 │    └── web.php
 ├── resources/
 │    └── views/
 └── .env


## Login and Registration


🧩 /register → Register page

🔐 /login → Login page

🧭 /dashboard → Authenticated dashboard

By default its registered as role : admin


##  🧑‍💻 Credits

Developed by Renjitha P R

For HSL Labs — A user-friendly, intuitive dashboard developed in Laravel 10 for HSL LABS - that Licensed Providers can use to manage their supplement business.
The dashboard includes:
• Ordering and managing inventory
• Tracking patient surgical timelines and subscriptions
• Recording payments and renewals
• Viewing patient, inventory, and billing data in real time



## Notes:

* Please keep in mind that migrations will be executed in chronological order based on the date-time saved in the migration name.
* This is not a fully fludged admin panel, it conatin only relevent fields showing the working path
