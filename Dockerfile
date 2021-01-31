FROM php:7-alpine
WORKDIR /var/www
COPY . /var/www
RUN apk update && apk add composer
RUN composer install
CMD php -S 0.0.0.0:8080 -t public