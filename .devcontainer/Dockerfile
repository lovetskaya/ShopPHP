FROM php:8.1-apache

# Установка расширения MySQL
RUN docker-php-ext-install mysqli

# Копирование файлов проекта
COPY . /var/www/html/

# Установка рабочей директории
WORKDIR /var/www/html