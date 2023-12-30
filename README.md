# Countries database for laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/centrex/laravel-countries.svg?style=flat-square)](https://packagist.org/packages/centrex/laravel-countries)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/centrex/laravel-countries/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/centrex/laravel-countries/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/centrex/laravel-countries/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/centrex/laravel-countries/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/centrex/laravel-countries?style=flat-square)](https://packagist.org/packages/centrex/laravel-countries)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require centrex/laravel-countries
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="countries-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="countries-config"
```

## Usage

```php
$laravelCountries = new Centrex\LaravelCountries();
echo $laravelCountries->echoPhrase('Hello, Centrex!');
```

## Testing

🧹 Keep a modern codebase with **Pint**:
```bash
composer lint
```

✅ Run refactors using **Rector**
```bash
composer refacto
```

⚗️ Run static analysis using **PHPStan**:
```bash
composer test:types
```

✅ Run unit tests using **PEST**
```bash
composer test:unit
```

🚀 Run the entire test suite:
```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [centrex](https://github.com/centrex)
- [All Contributors](../../contributors)
- [webpatser/laravel-countries](https://github.com/webpatser/laravel-countries)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
