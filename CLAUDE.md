# CLAUDE.md

## Package Overview

`centrex/laravel-countries` — Countries database and models for Laravel.

Namespace: `Centrex\LaravelCountries\`  
Service Provider: `LaravelCountriesServiceProvider`

## Commands

Run from inside this directory (`cd laravel-countries`):

```sh
composer install          # install dependencies
composer test             # full suite: rector dry-run, pint check, phpstan, pest
composer test:unit        # pest tests only
composer test:lint        # pint style check (read-only)
composer test:types       # phpstan static analysis
composer test:refacto     # rector refactor check (read-only)
composer lint             # apply pint formatting
composer refacto          # apply rector refactors
composer analyse          # phpstan (alias)
composer build            # prepare testbench workbench
composer start            # build + serve testbench dev server
```

Run a single test:
```sh
vendor/bin/pest tests/ExampleTest.php
vendor/bin/pest --filter "test name"
```

## Structure

```
src/
  LaravelCountriesServiceProvider.php
  Commands/
  Models/
config/config.php
database/
  migrations/
  seeders/          # country data seeder
tests/
workbench/
```

## Key Concepts

- Provides a `Country` Eloquent model with fields: name, ISO2 code, ISO3 code, phone code, currency, etc.
- Includes a seeder to populate the countries table with world country data
- Publish and run migrations, then seed to have country data available

## Conventions

- PHP 8.2+, `declare(strict_types=1)` in all files
- Pest for tests, snake_case test names
- Pint with `laravel` preset
- Rector targeting PHP 8.3 with `CODE_QUALITY`, `DEAD_CODE`, `EARLY_RETURN`, `TYPE_DECLARATION`, `PRIVATIZATION` sets
- PHPStan at level `max` with Larastan
