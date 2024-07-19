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
5. Create `.env` based on the `.env.example`
```bash
cp .env.example .env
```
6. Generate Application Key
```bash
php artisan key:generate
```
7. Login into your MySQL database and create `store_builder` database
```sql
CREATE DATABASE store_builder;
```
8. Run Migrations
```bash
php artisan migrate:fresh --seed
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
