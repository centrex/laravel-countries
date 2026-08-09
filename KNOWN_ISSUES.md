# Known Issues — laravel-countries

_Last checked: 2026-08-02_

## Failing tests

No failing tests. `composer test:unit` (Pest, parallel) passes: 2 passed (4 assertions). Note the suite is very thin — only 2 tests cover the whole package.

## Style / static-analysis debt

- `vendor/bin/pint --test` reports a clean pass — no style debt.
- `vendor/bin/rector --dry-run` reports **2 files** with pending refactors (`AddOverrideAttributeToOverriddenMethodsRector` on `src/LaravelCountriesServiceProvider.php:48` and `tests/TestCase.php:9`). Run `composer refacto` to apply. (This failure is what stops the chained `composer test` script before it reaches lint/types/unit — each subsequent step was run individually to get results below.)
- `vendor/bin/phpstan analyse` (level: `max`) reports **20 errors**, and `phpstan-baseline.neon` is present but **empty (0 entries)** — none of these are pre-accepted debt. Concentrated in `src/Models/Country.php` (missing generic/iterable value types on `getCountries()`, `getOne()`, `getList()`, `getListForSelect()`; `$countries` property/`json_decode()` typed as `mixed`/`string|false` flowing into strict property assignment; malformed `@param` PHPDoc tags for `$sort`/`$display`; a possibly-undefined `$countries` variable at line 131) plus a handful in `database/migrations/2023_11_20_010000_create_countries_table.php` and `database/seeders/CountriesSeeder.php` (mixed passed where `Schema::create()`/`dropIfExists()`/`Connection::table()` expect `string`).

## TODO / FIXME markers

None found (`grep -rn "TODO\|FIXME" --include="*.php" src/ config/ database/` — no matches).

## Open GitHub issues

Not checked — the `gh` CLI is not installed in this environment.
