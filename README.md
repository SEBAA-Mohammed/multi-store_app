# Multi-Store Application

# Running and Configuring Laravel Application with Inertia, React, TypeScript, Vite, and SQLite Database

## Installation Steps:
1. Clone the Repository
2. Install PHP Dependencies
```bash
composer install
```
3. Install JavaScript Dependencies
```bash
npm install
```
4. Run vite build:
```bash
npm run build
```
5. Generate Application Key
```bash
php artisan key:generate
```
6. Copy Environment Variables
```bash
cp .env.example .env
```
7. Create SQLite Database File
```bash
cp .env.example .env
```
8. Run Migrations
```bash
php artisan migrate
```
9. Create symlink storage 
```bash
php artisan storage:link
```
11. Start the Development Laravel Server
```bash
php artisan serve
```
11. Start the Development Node Server
```bash
npm run dev
```
