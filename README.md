<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>
<p align="center">
Praktikum 9: Form Processing, Form Validation & Localization
</p>

## Requirement

-   Composer
-   Node.js
-   PHP 7.3 or later
-   MySQL 5.7 or later

## Installation

```
git clone https://github.com/Gasiyu/pemrograman-web.git -b praktikum9
cd pemrograman-web
cp .env.example .env
```

Open `.env`, change `DB_DATABASE` according to your needs, then create a database with that name.

```
composer install
npm install
npm run dev

php artisan key:generate
php artisan migrate:fresh
php artisan storage:link

php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
