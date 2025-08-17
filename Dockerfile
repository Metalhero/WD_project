FROM php:8.3-cli

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Rendszer csomagok, Java, Allure, ZIP extension telepítése
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    wget \
    openjdk-21-jre-headless \
 && docker-php-ext-install pdo pdo_mysql zip \
 && wget https://github.com/allure-framework/allure2/releases/download/2.29.0/allure-2.29.0.zip \
 && unzip allure-2.29.0.zip -d /opt/ \
 && ln -s /opt/allure-2.29.0/bin/allure /usr/bin/allure \
 && rm allure-2.29.0.zip

WORKDIR /app
COPY . .

# PHP függőségek telepítése
RUN composer install --no-interaction --prefer-dist

# Alapértelmezett parancs: Codeception futtatása+ generate Allure report + start server
CMD vendor/bin/codecept run --ext Allure && allure serve tests/_output/allure-results -p 8080
