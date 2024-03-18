1. Клонируйте репозиторий
   ```
   git clone https://github.com/Dmit595987/app_test_task_18_03_2024.git
   ```

3. Смените рабочую директорию
   ```
   cd main_repo
   ```

5. Запустите Composer и установите все зависимости
   ```
   composer install
   ```

7. Сделайте файл .env и настройте подключение к БД
   ```
   cp .env.example .env
    ```
9. Сгенерируйте уникальный ключ приложения
    ```
    php artisan key:generate
    ```
10. Запустите миграции в БД
    ```
    php artisan migrate
    ```
11. Запустите сервер
    ```
    php artisan serve
    ```

Как использовать 
1. Получить сокращенную ссылку 
    POST запрос на URL /api/link
   
```
{
    "url": "https://yandex.ru/maps/?example=222"
}
```
Ответ будет ввиде JSON
```
{
    "url": "https://yandex.ru/dfddfD"
}
```
GET запрос на "https://yandex.ru/dfddfD"
Сделает переадресацию на изначальный URL

## License

The code open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
