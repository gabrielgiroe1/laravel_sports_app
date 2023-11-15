<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Build with
- [Laravel](https://laravel.org/)
- [Tailwindcss](https://tailwindcss.com)

## Installation

Follow these steps to set up and run the Laravel Sports App:

1. **Clone the repository**:

   `git clone git@github.com:gabrielgiroe1/laravel_sports_app.git`

2. Install PHP dependencies:
   `composer install`
3. Install javascript dependencies:
   `npm install`

4. Update .env file with your database and application configuration

5. Generate application key:
   `php artisan key:generate`

6. Run migrations to create tables in your database:
   `php artisan migrate`

7. Compile frontend assets:
   `npm run dev`

8. Start the development server:
   `php artisan serve --port=8888`


## Prerequisites for docker
Before you start, ensure that you have the following tools installed on your machine:

- Docker: [Install Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/)

## Installation using docker
1. **Clone the repository**:
```bash
   `git clone git@github.com:gabrielgiroe1/laravel_sports_app.git`
    cd laravel_sports_app
```

2. Create a copy of the .env.example file and rename it to .env:
```bash
    cp .env.example .env
```
3. Setup your environment variables (database, app name etc):
4. Build and start Docker containers:
```bash
    docker-compose up -d --build
```
5. Install Laravel dependencies and set up the database:
```bash
    docker-compose exec app composer install
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan migrate
```

## Stopping the Application
```bash
    docker-compose down
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
