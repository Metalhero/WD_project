# Dockerfile
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

# Először csak composer fájlok, gyorsabb cache buildhez (opcionális)
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist

# Másoljuk be a teljes projektet
COPY . .

# Másoljuk be az entrypoint scriptet fixeléssel (CRLF -> LF) és chmod-oljuk
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh \
 && chmod +x /usr/local/bin/docker-entrypoint.sh

# ENTRYPOINT exec formában (jelek forwarding miatt)
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
