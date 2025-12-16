<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

```
fixit
├─ .editorconfig
├─ app
│  ├─ Filament
│  │  └─ Resources
│  │     ├─ Aduans
│  │     │  ├─ AduanResource.php
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateAduan.php
│  │     │  │  ├─ EditAduan.php
│  │     │  │  └─ ListAduans.php
│  │     │  ├─ Schemas
│  │     │  │  └─ AduanForm.php
│  │     │  └─ Tables
│  │     │     └─ AduansTable.php
│  │     ├─ Ratings
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateRating.php
│  │     │  │  ├─ EditRating.php
│  │     │  │  └─ ListRatings.php
│  │     │  ├─ RatingResource.php
│  │     │  ├─ Schemas
│  │     │  │  └─ RatingForm.php
│  │     │  └─ Tables
│  │     │     └─ RatingsTable.php
│  │     ├─ Users
│  │     │  ├─ Pages
│  │     │  │  ├─ CreateUser.php
│  │     │  │  ├─ EditUser.php
│  │     │  │  ├─ ListUsers.php
│  │     │  │  └─ ViewUser.php
│  │     │  ├─ Schemas
│  │     │  │  ├─ UserForm.php
│  │     │  │  └─ UserInfolist.php
│  │     │  ├─ Tables
│  │     │  │  └─ UsersTable.php
│  │     │  └─ UserResource.php
│  │     └─ Zonas
│  │        ├─ Pages
│  │        │  ├─ CreateZona.php
│  │        │  ├─ EditZona.php
│  │        │  └─ ListZonas.php
│  │        ├─ Schemas
│  │        │  └─ ZonaForm.php
│  │        ├─ Tables
│  │        │  └─ ZonasTable.php
│  │        └─ ZonaResource.php
│  ├─ Http
│  │  └─ Controllers
│  │     ├─ AduanController.php
│  │     ├─ AuthController.php
│  │     ├─ Controller.php
│  │     └─ DashboardController.php
│  ├─ Models
│  │  ├─ Aduan.php
│  │  ├─ Rating.php
│  │  ├─ User.php
│  │  └─ Zona.php
│  └─ Providers
│     ├─ AppServiceProvider.php
│     └─ Filament
│        └─ AdminPanelProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2025_11_25_071754_create_zonas_table.php
│  │  ├─ 2025_11_25_071830_create_aduans_table.php
│  │  └─ 2025_11_25_071920_create_ratings_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ fonts
│  │  ├─ BrigendsExpanded.otf
│  │  └─ GraphiteDEMO.otf
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  └─ views
│     ├─ login.blade.php
│     └─ welcome.blade.php
├─ routes
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     ├─ 0390520826f8cfa66342489dc1063802.php
│  │     ├─ 05332129d3959bee1d98e830a7582f9f.php
│  │     ├─ 0af9a389a1bad915b0b35c50b85f719a.php
│  │     ├─ 166072322f8f6949c63de72bdbc3c7d8.php
│  │     ├─ 1dbc11bed0c8b65021089afc6b779597.php
│  │     ├─ 24a083b9fe2cd98617dcf80abfedd782.php
│  │     ├─ 26667023823e7015627b00d9436b0b35.php
│  │     ├─ 2a001be28460e18584dbc24682f3099b.php
│  │     ├─ 2f2233559237f0886076f31dd25228bf.php
│  │     ├─ 3997bcdba5d7d1cf126fe4629e54e1be.php
│  │     ├─ 4729b9b8fd30f233a8c651298d4d814d.php
│  │     ├─ 4a8d48baa960971d6ba446ceed586b90.php
│  │     ├─ 4ef8f80fa17f0d2c68ca7cfdc8a3f4e4.php
│  │     ├─ 4ff4a2978592be91191ad1e4c1917ea6.php
│  │     ├─ 5226022f8b25ec43e7182c95d8cab322.php
│  │     ├─ 6e7a1d91e35f23efe1713435d24ccfaa.php
│  │     ├─ 712de82258f50a0e51b3fdbd2417ee84.php
│  │     ├─ 7853ddc04223fc90dcd3b404cc56ef0e.php
│  │     ├─ 82b5794ee25a8bd7a202c79cee8721d4.php
│  │     ├─ 8312085a71a132d0252f5333c7b4caf5.php
│  │     ├─ 832b8427fcd2109a030e15ed22324eec.php
│  │     ├─ 839a368670ae6508852596bf71116591.php
│  │     ├─ 8d0775f7b4745954074de53c7135cb84.php
│  │     ├─ 93d1a7ee4b8120ca01bc62c7ab0a4f51.php
│  │     ├─ 9abd8677a2ef8415ff50872fe776ca9e.php
│  │     ├─ a073e57a983514b17daf8ade3043cb85.php
│  │     ├─ a7555de5f8eacf34fcd73a331b5c1c6d.php
│  │     ├─ a9093d9c45d018d183bbccc485d3d6ec.php
│  │     ├─ b2e9fe0bceb4ea53109a54d016852c67.php
│  │     ├─ b90287ae2e5a99ddf2f46c90c54c1068.php
│  │     ├─ bf3b594935886c043ca544f8c0b41300.php
│  │     ├─ c036ae21bdde05b6108e06849ef53ffb.php
│  │     ├─ c3294cf9b39cbec8affaa2106d4e6b88.php
│  │     ├─ ca7f971d694d825046865b6dbffc7286.php
│  │     ├─ ce4a2caeeee1fd82e1c4070b05ee48e6.php
│  │     ├─ cf16a4c892799785f853a694b7645844.php
│  │     ├─ d0c433b4ab691da80c4df2408a814ef8.php
│  │     ├─ d1fd7bff27d9fa05c6da04cfb79e4262.php
│  │     ├─ e6e4223af915483b502119aeef971938.php
│  │     ├─ eb3924b7c2a2ecc0e1cae29934e81bff.php
│  │     ├─ ec0903b221c0d9322f67c3958b883ffd.php
│  │     ├─ ecd5eefb5923714a816d0bfb49000fdc.php
│  │     └─ f3aa044dd201ccf89a4c24de8ed75881.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```