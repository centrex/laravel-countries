# Countries database for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/centrex/laravel-countries.svg?style=flat-square)](https://packagist.org/packages/centrex/laravel-countries)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/centrex/laravel-countries/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/centrex/laravel-countries/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/centrex/laravel-countries/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/centrex/laravel-countries/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/centrex/laravel-countries?style=flat-square)](https://packagist.org/packages/centrex/laravel-countries)

A complete country database seeded from a JSON source. Provides an Eloquent `Country` model with support for listing and sorting by any country field, and lookup by country code.

## Installation

```bash
composer require centrex/laravel-countries
php artisan vendor:publish --tag="laravel-countries-migrations"
php artisan migrate
php artisan db:seed --class="Centrex\LaravelCountries\Database\Seeders\CountrySeeder"
```

## Usage

```php
use Centrex\LaravelCountries\Models\Country;

// Get all countries
Country::all();

// Find by country code (ISO 3166-1)
Country::whereCountryCode('BD')->first();

// Get sorted list (sortable by: capital, citizenship, country-code, currency, ...)
$model = new Country();
$list = $model->getList('capital');   // sorted by capital city

// Get a single country by ID
$country = $model->getOne('BD');
```

### Config

```bash
php artisan vendor:publish --tag="laravel-countries-config"
```

```php
// config/countries.php
'table_name' => 'countries',
```

### Used by laravel-addresses

This package is a dependency of `laravel-addresses` — the countries table provides the foreign key for address country validation.

## Testing

```bash
composer test        # full suite
composer test:unit   # pest only
composer test:types  # phpstan
composer lint        # pint
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [centrex](https://github.com/centrex)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
