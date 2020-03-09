FROM php:7.2.13-fpm-alpine3.8

RUN apk update \
 && apk add --no-cache $PHPIZE_DEPS \
    git \
    zip \
    unzip \
 && docker-php-ext-install \
    opcache \
    pdo_mysql \
 && docker-php-ext-enable \
    opcache \
 && rm -rf \
    /var/cache/apk/* \
    /var/lib/apt/lists/*


COPY ./docker/phpfpm/php.ini /usr/local/etc/php/conf.d/php.override.ini
COPY ./nginx-server/nginx.conf /usr/local/etc/php-fpm.d/www.conf