FROM php:7-alpine
WORKDIR /var/www
COPY . /var/www
RUN apk update && \
    apk add composer && \
    apk add --update icu-dev && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl

RUN composer install
CMD php -S 0.0.0.0:8080 -t public