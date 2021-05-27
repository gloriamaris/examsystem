FROM php:7.2-fpm

RUN apt-get update && apt-get install -y mariadb-client curl zip unzip
RUN apt-get install -y libmcrypt-dev
RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www
