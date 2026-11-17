# TOS Travel Agency

A full-stack travel agency web application built with **React, TypeScript, Vite, Laravel, PHP, and MySQL**.

This repository contains both the frontend and backend in one project.

## 1. Project Structure

```text
TOS-TRAVEL-AGENCY/
│
├── backend/                 # Laravel backend (REST API)
│   ├── app/
│   ├── database/
│   ├── routes/
│   ├── public/
│   ├── .env.example
│   └── artisan
│
├── src/                     # React frontend
│   ├── components/
│   ├── lib/
│   └── ...
│
├── public/                  # Frontend public assets
├── package.json
├── index.html
└── README.md
```

## 2. Technologies

### Frontend
- React 18
- TypeScript
- Vite
- Tailwind CSS

### Backend
- Laravel 13
- PHP 8.3+
- REST API

### Databases
- MySQL — Laravel application data

## 3. Requirements

Install the following software before starting:

| Software | Recommended version |
|---|---|
| PHP | 8.3 or newer |
| Composer | Latest |
| Node.js | 20 or newer |
| npm | Included with Node.js |
| MySQL | 8.0 or compatible |
| Git | Latest |
| XAMPP | Optional, for local MySQL and phpMyAdmin |

You can check your installed versions:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

## 4. Clone the Repository

Open your terminal and run:

```bash
git clone https://github.com/hamsokhoeurn3-byte/TOS-TRAVEL-AGENCY.git
```

Go into the project:

```bash
cd TOS-TRAVEL-AGENCY
```

## 5. Configure the MySQL Database

Start MySQL using XAMPP or your local MySQL installation.

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a new database:

```sql
CREATE DATABASE tos_travel_agency_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

## 6. Set Up the Laravel Backend

Open a terminal in the project root:

```bash
cd backend
```

### Step 1: Install PHP dependencies

```bash
composer install
```

### Step 2: Create the environment file

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

### Step 3: Configure the database

Open `backend/.env` and configure your MySQL connection:

```env
APP_NAME="TOS Travel Agency"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tos_travel_agency_db
DB_USERNAME=root
DB_PASSWORD=
```

Change the database username and password if your local MySQL configuration is different.

### Step 4: Generate the application key

```bash
php artisan key:generate
```

### Step 5: Run database migrations

```bash
php artisan migrate
```

This creates the database tables.

**Important:** Do not use `php artisan migrate:fresh` on a database containing data. It deletes existing tables and their data.

### Step 6: Start the Laravel server

```bash
php artisan serve
```

The backend will run at:

```text
http://127.0.0.1:8000
```

API base URL:

```text
http://127.0.0.1:8000/api
```

## 7. Set Up the React Frontend

Open a second terminal.

Go to the project root:

```bash
cd TOS-TRAVEL-AGENCY
```

Install frontend dependencies:

```bash
npm install
```

### Configure environment variables

Create a frontend `.env` file if required by the application.

Also check the frontend API configuration and make sure its Laravel API base URL points to:

```text
http://127.0.0.1:8000/api
```

Use the exact environment variable name expected by the existing frontend code.

### Start the frontend

```bash
npm run dev
```

Vite will display the local development URL, usually:

```text
http://localhost:5173
```

Open that address in your browser.

## 8. Database Responsibilities

The application stores its data in the Laravel MySQL database, which can be managed through phpMyAdmin:

| Feature | Database |
|---|---|
| Tours | MySQL (Laravel) |
| Tour details | MySQL (Laravel) |
| Tour bookings | MySQL (Laravel) |
| Hotels | MySQL (Laravel) |
| Hotel details | MySQL (Laravel) |
| Stay bookings | MySQL (Laravel) |
| Transportation and other service requests | MySQL (Laravel) |
| AI Trip Planner saved plans | MySQL (Laravel) |

## 9. Available Laravel API Routes

The current backend includes these API endpoints:

| Method | Endpoint | Purpose |
|---|---|---|
| GET | `/api/tours` | Get tours |
| GET | `/api/tours/{slug}` | Get tour details |
| POST | `/api/bookings` | Create a tour booking |
| GET | `/api/hotels` | Get hotels |
| GET | `/api/hotels/{slug}` | Get hotel details |
| POST | `/api/stay-bookings` | Create a hotel booking |
| POST | `/api/service-requests` | Submit a service request |
| POST | `/api/trip-plans` | Save an AI Trip Planner itinerary |

## 10. Running the Full Application

You need two terminals running at the same time.

**Terminal 1 — Laravel backend**

```bash
cd backend
php artisan serve
```

**Terminal 2 — React frontend**

```bash
npm run dev
```

Open:

```text
http://localhost:5173
```

Make sure MySQL is running and both environment files are configured correctly.

## 11. Useful Development Commands

### Laravel

```bash
php artisan route:list --path=api
php artisan migrate:status
php artisan migrate
php artisan optimize:clear
php artisan config:clear
```

### React

```bash
npm install
npm run dev
npm run build
npm run preview
```

## 12. Troubleshooting

### Database connection error

Check:
- MySQL is running.
- Database `tos_travel_agency_db` exists.
- Database credentials in `backend/.env` are correct.
- Laravel configuration cache is cleared.

```bash
php artisan optimize:clear
```

### Frontend cannot connect to Laravel

Check:
- Laravel server is running.
- API base URL is correct.
- Laravel CORS configuration allows the frontend development URL.

### Missing Laravel application key

Run:

```bash
php artisan key:generate
```

### Missing frontend dependencies

Run:

```bash
npm install
```

### Missing PHP dependencies

Run:

```bash
composer install
```

## 13. Git Workflow

To get the latest changes:

```bash
git pull origin main
```

To upload your changes:

```bash
git add -A
git commit -m "Describe your changes"
git push origin main
```

## 14. Security Notes

- Never upload `.env` files.
- Never publish database passwords.
- Never publish private API keys or service credentials.
- Keep `backend/.env` and frontend `.env` files local.
- Use `.env.example` files to document required configuration variables.
- Do not commit `vendor/` or `node_modules/`.

## 15. Repository

GitHub:

https://github.com/hamsokhoeurn3-byte/TOS-TRAVEL-AGENCY

---

**TOS Travel Agency**

Full-stack travel agency web application.
