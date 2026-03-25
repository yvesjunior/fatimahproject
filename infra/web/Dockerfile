FROM php:8.4-apache
LABEL org.opencontainers.image.authors="yvesjuniorbationo@gmail.com"

# Install PHP extensions
RUN apt-get update && apt-get install -y \
        libicu-dev \
        libzip-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libpq-dev \
        libxml2-dev \
        vim \
        net-tools \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        intl \
        zip \
        gd \
        pdo_mysql \
        pdo_pgsql \
        bcmath \
        xml \
        opcache \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Apache settings
RUN a2enmod rewrite headers ssl
COPY ./configs/app.conf /etc/apache2/sites-available/000-default.conf
RUN a2ensite 000-default

# PHP settings
COPY ./configs/php.ini /usr/local/etc/php/conf.d/custom.ini

# Entrypoint
COPY entrypoint.sh /sbin/entrypoint.sh
RUN chmod 755 /sbin/entrypoint.sh

WORKDIR /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["/sbin/entrypoint.sh"]
