# ./docker/php/Dockerfile
FROM php:8.1-fpm-alpine

RUN apk --update --no-cache add git

RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS} \
      && pecl install xdebug \
      && docker-php-ext-enable xdebug \
      && apk del pcre-dev ${PHPIZE_DEPS}

RUN docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD composer install ;  php-fpm

EXPOSE 9000



