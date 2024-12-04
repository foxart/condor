FROM php:8.4-fpm-alpine
ARG PROJECT_DIR
RUN apk update
RUN apk add --update --no-cache $PHPIZE_DEPS \
    curl \
    git \
    libzip-dev
RUN docker-php-ext-install -j$(nproc) bcmath
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install zip
RUN pecl install ds-1.4.0 && docker-php-ext-enable ds
RUN pecl install mongodb-1.16.2 && docker-php-ext-enable mongodb
RUN pecl install xdebug-3.1.5 \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=default" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"
WORKDIR /var/www
ADD $PROJECT_DIR /var/www
RUN chmod -R 777 storage
