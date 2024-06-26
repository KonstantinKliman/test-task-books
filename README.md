<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

---

### Задание:

>Необходимо разработать проект на PHP, предпочтительно с использованием фреймворка Laravel.
>
>База данных:
>В базе данных проекта существуют 2 таблицы: "авторы" и "книги". У одного автора может быть несколько книг, а у одной книги может быть несколько авторов.
>
>Задачи:
>1) Создать REST API маршрут для добавления авторов с возможностью привязки книг.
>2) Создать REST API маршрут для добавления книг с возможностью привязки авторов.
>3) Создать REST API маршрут для получения информации об авторах вместе с их книгами.
>4) Создать REST API маршрут для получения информации о книгах вместе с их авторами.

---

### Стек:

- PHP 8.2
- Laravel 11.12
- MySQL 8.0

---

1. Клонируем проект

```bash
git clone https://github.com/KonstantinKliman/test-task-books.git
```

2. Переходим в папку с проектом

```
cd test-task-books
```

3. Копируем и переименовываем .env.example в .env

4. Устанавливаем зависимости composer

```bash
composer install
```

5. Билдим и поднимаем контейнеры

```bash
./vendor/bin/sail build
```

```bash
./vendor/bin/sail up -d
```

7. Генерируем ключ

```
./vendor/bin/sail artisan key:generate
```

8. Применяем миграции
```
./vendor/bin/sail artisan migrate
```

Ссылка на Postman коллекцию
https://www.postman.com/altimetry-astronaut-57754230/workspace/booksapi/collection/27056206-7909d45a-7df8-4331-affc-b744689fb277?action=share&creator=27056206&active-environment=27056206-f4a2fc2d-0a3d-4e68-8874-22d0f0eb4f1b

