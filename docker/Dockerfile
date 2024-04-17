FROM php:8.2-fpm

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Install dependencies
# RUN apt-get update && apt-get install -y software-properties-common 
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
# RUN add-apt-repository ppa:ondrej/php
RUN  apt update && apt-get install -y \
    git \
    curl \
    zip \
    unzip
RUN apt-get install gettext-base

RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
# creates a home directory for the user and ensures that bash is the default shell
RUN useradd -ms /bin/bash damian 
USER damian

WORKDIR /var/www/html/web
CMD [ "php", "-S", "0.0.0.0:8000" ]

