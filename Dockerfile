FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y libpq-dev libpng-dev libxml2 libxml++2.6-dev cron git procps mc libfontconfig1 libxrender1 yamllint libzip-dev libonig-dev librabbitmq-dev libmagickwand-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install \
        bcmath pdo_mysql gd iconv intl \
        pdo sockets zip soap pcntl

RUN pecl install apcu amqp imagick && docker-php-ext-enable amqp imagick

#X debug
ARG INSTALL_DEV_TOOLS=false

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN git clone https://github.com/tony2001/pinba_extension /tmp/pinba_extension \
    && cd /tmp/pinba_extension \
    && phpize \
    && ./configure --enable-pinba \
    && make install

RUN mkdir -p /var/www/.composer

WORKDIR /app

# non-root user.
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN chown -R ${USER_ID}:${GROUP_ID} /var/www/.composer
RUN groupmod -g ${GROUP_ID} www-data && \
    usermod -u ${USER_ID} www-data

USER "${USER_ID}:${GROUP_ID}"

# files for stage or prod
#COPY --chown=${USER_ID}:${GROUP_ID} ./ /app

USER www-data

CMD ["php-fpm"]
