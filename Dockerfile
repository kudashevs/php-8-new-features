FROM php:8-cli

RUN apt-get update && apt-get install -y zip libzip-dev \
    && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require phpunit/phpunit --no-progress

WORKDIR /var/www

CMD ["/bin/bash"]