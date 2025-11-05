FROM php:8.3-apache

# Enable mod_rewrite (Laravel, clean URLs, etc.)
RUN a2enmod rewrite

# Install required system packages for PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libonig-dev \
    libxml2-dev \
    sqlite3 \
    libsqlite3-dev \
    libcurl4-openssl-dev \
    default-mysql-client \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        pdo_sqlite \
        zip \
        bcmath \
        mbstring

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html