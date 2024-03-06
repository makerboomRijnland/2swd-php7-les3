FROM php:8.1-fpm

# Installing dependencies for the PHP modules
RUN apt-get update && \
    apt-get install -y zip curl libcurl3-dev libzip-dev libpng-dev libonig-dev libxml2-dev
    # libonig-dev is needed for oniguruma which is needed for mbstring

# Installing additional PHP modules
RUN docker-php-ext-install curl gd mbstring mysqli pdo pdo_mysql xml

# Install and configure ImageMagick
RUN apt-get install -y libmagickwand-dev
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN apt-get purge -y libmagickwand-dev

# Install Composer so it's available
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer