FROM composer as backend

WORKDIR /app

COPY composer.json composer.lock /app/
RUN composer install  \
    --ignore-platform-reqs \
    --no-ansi \
    --no-autoloader \
    --no-dev \
    --no-interaction \
    --no-scripts

COPY resources/views /app/

RUN composer dump-autoload --no-dev --optimize --classmap-authoritative

FROM php:8.0.7-apache

RUN docker-php-ext-install pdo_mysql

WORKDIR /app
COPY --from=backend / /var/www/html/
COPY php.ini /usr/local/etc/php/php.ini

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
