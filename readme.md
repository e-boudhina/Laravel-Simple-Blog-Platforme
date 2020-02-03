<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About This Larvel Mini-Project 
 
* php artisan --version => Laravel Framework 5.8.36

This is a Simple blog platforme that allows a user to authenticate, create posts with a thumbnail, the blog contains posts which are composed of three parts : title, body and an optional image file .

Users must First register in order to get access and then perform C.R.U.D operations . 

This project uses :

   * composer require "laravelcollective/html" to manage forms 
   * composer require unisharp/laravel-ckeditor to edit post's body 



Routes :

* php artisan route:list
     
| Domain | Method    | URI     | Name             | Action      |                Middleware      
| ----------| ---------- | -----------------------| ---------------- |-----------|----------- |
|        | GET|HEAD  | /                      |                  | App\Http\Controllers\PagesController@index                             | web          |
|        | GET|HEAD  | about                  |                  | App\Http\Controllers\PagesController@about                             | web          |
|        | GET|HEAD  | api/user               |                  | Closure                                                                | api,auth:api |
|        | GET|HEAD  | dashboard              |                  | App\Http\Controllers\DashboardController@index                         | web,auth     |
|        | POST      | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | GET|HEAD  | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST      | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web          |
|        | POST      | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
|        | POST      | password/reset         | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
|        | GET|HEAD  | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
|        | GET|HEAD  | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
|        | GET|HEAD  | posts                  | posts.index      | App\Http\Controllers\PostsController@index                             | web          |
|        | POST      | posts                  | posts.store      | App\Http\Controllers\PostsController@store                             | web,auth     |
|        | GET|HEAD  | posts/create           | posts.create     | App\Http\Controllers\PostsController@create                            | web,auth     |
|        | PUT|PATCH | posts/{post}           | posts.update     | App\Http\Controllers\PostsController@update                            | web,auth     |
|        | GET|HEAD  | posts/{post}           | posts.show       | App\Http\Controllers\PostsController@show                              | web          |
|        | DELETE    | posts/{post}           | posts.destroy    | App\Http\Controllers\PostsController@destroy                           | web,auth     |
|        | GET|HEAD  | posts/{post}/edit      | posts.edit       | App\Http\Controllers\PostsController@edit                              | web,auth     |
|        | GET|HEAD  | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
|        | POST      | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
|        | GET|HEAD  | services               |                  | App\Http\Controllers\PagesController@services                          | web       
       


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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.






## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
