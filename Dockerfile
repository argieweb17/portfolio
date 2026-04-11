FROM php:8.2-cli-alpine

RUN apk add --no-cache \
    bash \
    git \
    icu-dev \
    libzip-dev \
    postgresql-dev \
    unzip

RUN docker-php-ext-install -j"$(nproc)" \
    intl \
    opcache \
    pdo_pgsql \
    zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

ENV APP_ENV=prod
ENV APP_DEBUG=0
ENV APP_SECRET=change-me-in-railway

RUN mkdir -p var/cache var/log var/share \
    && chmod -R 777 var

RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader

EXPOSE 8000

CMD ["sh", "-c", "APP_ENV=prod APP_DEBUG=0 php -S 0.0.0.0:${PORT:-8000} -t public public/index.php"]