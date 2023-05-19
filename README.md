# Приложение таск-трекер

>Тестовое задание на позицию full-stack для ITGLOBAL

## Используемые технологии

* [Laravel 10](https://laravel.com/docs/10.x)
* [Composer](https://getcomposer.org/)
* [PHP 8](https://www.php.net/)
* [Bootstrap 5](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
* [Docker](https://www.docker.com/)

### Как запустить приложение
1. Клонируем репозиторий в папку с проектами
2. Переходим в репозиторий
```
cd itglobal
```
3. Поднимаем докер сервер
```
docker compose up -d
```
4. Устанавливаем зависимости
```
composer install
```
5. Перейти в баш контейнера с проектом
```
docker exec -it itglobal-laravel.test-1 bash
```
6. Добавление демо данных в бд
```
php artisan migrate:fresh --seed
```

Приложение доступно по адресу http://localhost/


Phpmyadmin для просмотра бд http://localhost:8001/

login - sail

pw- password
