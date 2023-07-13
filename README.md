Здраствуйте я зделал задания.
Но все дополнительные услуги имеют фиксированную цену. Также я написал тесты. Все routes в api.php

# Установить зависимости
composer install

# Скопируйте .env файл
cp .env.example .env

# Сгенерировать ключ приложения
php artisan key:generate

# Запустите миграции и cидеры
php artisan migrate --seed

# Для запуска тестов
php artisan test

# Запустите сервер
php artisan serve
