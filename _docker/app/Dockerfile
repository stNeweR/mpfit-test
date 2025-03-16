FROM php:8.3-fpm

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y \
    apt-utils \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    default-mysql-client \
    libcurl4-openssl-dev \
    libonig-dev \
    && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Установка расширений PHP
RUN docker-php-ext-install pdo_pgsql pgsql bcmath gd zip pdo_mysql mysqli

# Установка Xdebug (если нужно)
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Копирование конфигураций PHP и Xdebug
COPY ./_docker/app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Установка Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www
