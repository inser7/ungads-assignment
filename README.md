## Installation
```
git clone https://github.com/inser7/ungads.git
cd ungads
composer install
php artisan migrate
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=AnimalTableSeeder

Run `npm ci` to install dependencies and `npm run dev` to build public/js/app.js.
