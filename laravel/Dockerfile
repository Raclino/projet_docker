FROM php:8.0-apache AS builder

#Install git and MySQL extensions for PHP

RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
ADD laravel /var/www/html
RUN chown -R root /var/www/html
RUN chmod -R 777 /var/www/html
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-interaction --no-dev --prefer-dist
RUN cp .env.example .env && php artisan key:generate
CMD ["php", "artisan", "migrate"]
EXPOSE 80/tcp