# BASE SOURCE CODE
Author by: Do Phu Cuong <phucuongdo1996@gmail.com>

Laravel version: 8.x

## Dựng môi trường
Clone laradock từ laradock.io:
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
Vào workspace cài đặt package
````
docker-compose exec workspace bash
>> composer install
>> composer dump-autoload
>> php artisan key:gene
>> php artisan migrate
>> php artisan db:seed
````
Chạy laravel mix
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
Tạo model kèm theo migration và controller
````
php artisan make:model {name model} --mc
````
Tạo migration
````
php artisan make:migration create_flights_table
````
Tạo enum cho Model (Các enum của 1 model nhóm vào 1 folder tên theo tên Model)
````
php artisan make:enum User/Role
````
Tạo Policy để kiểm tra quyền thao tác với Model (Create, Update, Delete,...)
````
php artisan make:policy PostPolicy --model=Post
````
Tạo Component sử dụng ở view Blade (Sau khi tạo đăng ký trong AppServiceProvider.php)
````
php artisan make:component Form/Button
php artisan make:component Modal/Confirm
````
