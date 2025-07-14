# Gunakan image PHP + Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip zip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath

# Enable mod_rewrite untuk Laravel
RUN a2enmod rewrite

# Salin source code ke dalam container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set permission untuk Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
