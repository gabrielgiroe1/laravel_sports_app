#!/bin/bash

if [ ! -f vendor/autoload.php ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Create env file from env $APP_ENV"
    cp .env.example .env
else
    echo ".env file exists"
fi

until php artisan migrate; do
    echo "Database is not available - waiting for it..."
    sleep 5
done

php artisan migrate
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear

npm run dev


php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"

