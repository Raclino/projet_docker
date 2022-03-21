FROM php:8.0 AS builder

#Install git and MySQL extensions for PHP

RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN mkdir /public
ADD index.php /public
CMD ["php", "-S", "0.0.0.0:80", "-t", "/public"]
EXPOSE 80/tcp