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
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"
WORKDIR /var/www
ADD $PROJECT_DIR /var/www
