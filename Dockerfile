FROM php:8.2-fpm

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Устанавливаем расширения PHP
RUN docker-php-ext-install pdo pdo_mysql gd

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем проект
COPY . /var/www

# Переходим в рабочую директорию
WORKDIR /var/www

# Устанавливаем зависимости проекта
RUN composer install

# Открываем порт 9000
EXPOSE 9000
