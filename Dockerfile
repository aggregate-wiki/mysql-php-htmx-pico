FROM php:apache

RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pgsql && docker-php-ext-enable pgsql

WORKDIR /var/www/html
COPY ./ ./
