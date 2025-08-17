#!/bin/sh
vendor/bin/codecept run --ext Allure
mkdir -p tests/_output/allure-results

# generáljuk a HTML reportot
allure generate tests/_output/allure-results -o tests/_output/allure-report --clean

# indítunk egy egyszerű webszervert a report mappára
exec php -S 0.0.0.0:8080 -t tests/_output/allure-report
