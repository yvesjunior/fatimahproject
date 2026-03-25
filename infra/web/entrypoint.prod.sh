#!/bin/bash
set -e

cd /var/www/html

# Create storage link if it doesn't exist
if [ ! -L public/storage ]; then
    php artisan storage:link
fi

# Run migrations
php artisan migrate --force

# Cache configuration and routes for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set permissions
chown -R www-data:www-data storage bootstrap/cache

source /etc/apache2/envvars
exec apache2 -D FOREGROUND
