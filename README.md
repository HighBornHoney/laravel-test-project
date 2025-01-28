# Установка
Необходимо клонировать репозиторий `git clone https://github.com/HighBornHoney/laravel-test-project.git`

Перейти в папку с проектом `cd laravel-test-project`

Установить зависимости `composer install`

Переименовать .env.example в .env, указать в нем настройки для подключения к БД

Сгенерировать APP_KEY
`php artisan key:generate`

Выполнить миграции
`php artisan migrate`

Заполнить базу данных тестовыми данными
`php artisan db:seed`

Создать Password Grant Client для получения токенов по логину и паролю
`php artisan passport:client --password`

Установить npm зависимости и выполнить сборку
`npm install && npm run build`

Запустить локальный dev сервер Laravel
`composer run dev`

# Запросы

## Выход из системы, приводит к отзыву всех токенов

### Request

`POST /logout`

## Просмотр активных сессий текущего пользователя

### Request

`GET /sessions`

## Закрыть сессию по ее ID

### Request

`DELETE /sessions/{id}`

## Создать заказ

### Request

`POST /api/orders`

{
    "type_id": 1,
    "partnership_id": 1,
    "date": "2025-01-12",
    "address": "Moscow",
    "amount": 100,
    "status": "created"
}

## Назначить работника на заказ

### Request

`POST /api/orders/{orderId}/assign-worker`

{
"worker_id": 1,
"amount": 100
}

## Фильтр по заказам

### Request

`POST /api/workers/filter-by-order-types`

{
"order_type_ids": [4, 5]
}

# Дополнительная информация

Каждый запрос должен сопровождаться заголовками `Autorization: Bearer {access_token}` и `Accept: application/json`

Для удобства на главной странице добавлена форма для отправки данных на endpoint получения токена
