FROM php:8.3-cli

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y unzip openjdk-17-jre wget && \
    wget https://github.com/allure-framework/allure2/releases/download/2.29.0/allure-2.29.0.zip && \
    unzip allure-2.29.0.zip -d /opt/ && \
    ln -s /opt/allure-2.29.0/bin/allure /usr/bin/allure && \
    rm allure-2.29.0.zip

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY . .

RUN composer install --no-interaction --prefer-dist

CMD ["vendor/bin/codecept", "run"]
