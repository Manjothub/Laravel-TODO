FROM php:8.2-cli-alpine
WORKDIR /var/www/html
RUN apk add --no-cache curl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV COMPOSER_MEMORY_LIMIT=-1
COPY . .
RUN composer install
CMD ["php","artisan","serve","--host=0.0.0.0"]
