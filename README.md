# Laravel API Authentication

[![Latest Stable Version](https://poser.pugx.org/miladev/laravel-api-auth/v)](//packagist.org/packages/miladev/laravel-api-auth)
[![License](https://poser.pugx.org/miladev/laravel-api-auth/license)](//packagist.org/packages/miladev/laravel-api-auth)
[![Total Downloads](https://poser.pugx.org/miladev/laravel-api-auth/downloads)](//packagist.org/packages/miladev/laravel-api-auth)

<a href="https://github.com/miladev95/laravel-api-auth/issues"><img src="https://img.shields.io/github/issues/miladev95/laravel-api-auth.svg" alt=""></a>
<a href="https://github.com/miladev95/laravel-api-auth/stargazers"><img src="https://img.shields.io/github/stars/miladev95/laravel-api-auth.svg" alt=""></a>
<a href="https://github.com/miladev95/laravel-api-auth/network"><img src="https://img.shields.io/github/forks/miladev95/laravel-api-auth.svg" alt=""></a>

Laravel API Authentication Library simplifies API authentication setup in Laravel applications. It provides a set of stubs and tools to help you quickly implement API authentication using Laravel Passport.

## Features

- Easy integration of Laravel Passport for OAuth2 authentication.
- Pre-configured stubs for authentication-related files.
- Streamlined API token generation and management.
- Simplified setup process for API authentication.

## Installation

before install library you need to install passport

To install Laravel Passport, which is a Laravel package that provides OAuth2 authentication for your API, you can follow these steps:

## Install Laravel Passport Package
Open your terminal and navigate to the root directory of your Laravel project. Then run the following Composer command to install the Passport package:

```bash
composer require laravel/passport
```
## Run Migration
After installing the package, you need to run the migration command to create the necessary database tables for Passport. Run the following command in your terminal:
```bash
php artisan migrate
```

## Install Passport
Once the migration is complete, you can install Passport using the following command:
```bash
php artisan passport:install
```
This command will create the encryption keys needed for Passport.
## Configure Auth Service Provider
Open your config/auth.php configuration file and locate the guards configuration. Add a new guard configuration for API authentication using Passport:
```php
'guards' => [
    // ...
    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],
```
**You can install the package via composer:**

```bash
composer require miladev/laravel-api-auth
```

If you are using Laravel Package Auto-Discovery, you don't need you to manually add the ServiceProvider.

```bash
php artisan vendor:publish --tag=stubs
```

DONE, now you have AuthController With Auth Request with features like login, register, logout.

## Contribute

Contributions are welcome! If you have improvements or bug fixes to suggest, feel free to open issues and submit pull requests.

## License

This library is open-source software licensed under the MIT License.

Happy coding! 👨‍💻👩‍💻

