# phpのベースイメージ
FROM php:8.1.16-fpm

ENV TZ Asia/Tokyo

RUN apt-get update && \
	apt-get install -y git unzip libzip-dev libicu-dev libonig-dev && \
	docker-php-ext-install intl pdo_mysql zip bcmath

# Nodeの使用
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
		
COPY ./docker/app/php.ini /usr/local/etc/php/php.ini

COPY --from=composer:2.5.5 /usr/bin/composer /usr/bin/composer

WORKDIR /app