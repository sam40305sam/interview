# Getting started

## Requirements

-   PHP >= 7.3
-   Composer
-   MySQL

## Installation

Clone the repository

```bash
git clone git@github.com:sam40305sam/laravel_test.git
```

Switch to the repo folder

```bash
cd laravel_test
```

Install all the dependencies using composer

```bash
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```

Generate a new application key

```bash
php artisan key:generate
```

Run the database migrations (Set the database connection in .env before migrating)

```bash
php artisan migrate
```

Database seeding

```bash
php artisan db:seed
```

Start the local development server

```bash
php artisan serve
```
