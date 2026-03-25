#!/bin/bash
set -e

cd /var/www/html

# Create storage link if it doesn't exist
if [ ! -L public/storage ]; then
    php artisan storage:link 2>/dev/null || true
fi

# Run migrations in development
if [ "${APP_ENV}" != "production" ]; then
    php artisan migrate --force 2>/dev/null || true
fi

# Set permissions
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

source /etc/apache2/envvars
exec apache2 -D FOREGROUND
