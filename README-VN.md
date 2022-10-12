# BASE SOURCE CODE
Author by: Do Phu Cuong <phucuongdo1996@gmail.com>

Laravel version: 8.x

## Build project for developer
Clone laradock from laradock.io:
````
git clone https://github.com/Laradock/laradock.git
````
Config .env
````
cd laradock
cp .env.example .env
vi .env
````
`Config MYSQL and NGINX`
`MYSQL version 5.7`
`PHP 7.4`

Build NGINX and MYSQL
````
docker-compose build nginx mysql
docker-compose up -d nginx mysql
````
In workspace install composer
````
docker-compose exec workspace bash
>> composer install
>> composer dump-autoload
>> php artisan key:gene
>> php artisan migrate
>> php artisan db:seed
````
Run laravel mix
````
>> npm run dev
````
Out workspace, visit Peppol CRM Project and config .env
````
>> exit
cp .env.example .env
vi .env
````
`Config Database Connection`
## For Developer
Create Model with Migration and Controller
````
php artisan make:model {name model} --mc
````
Create migration
````
php artisan make:migration create_flights_table
````
Create Enum
````
php artisan make:enum User/Role
````
Create Policy (example: Post model)
````
php artisan make:policy PostPolicy --model=Post
````
Create Component for Blade Templates
````
php artisan make:component Form/Button
````
