# agents.md

## Agent Guidance — laravel-countries

### Package Purpose
Provides a `Country` Eloquent model and a seeder to populate country data (names, ISO codes, phone codes, currencies, etc.) for use in Laravel applications.

### Before Making Changes
- Read `src/Models/` to understand the `Country` model fields
- Check `database/seeders/` to understand the data format and source
- Check `database/migrations/` before adding or changing fields

### Common Tasks

**Adding a new field to the Country model**
1. Create a new migration with `->nullable()` so existing seeded data isn't broken
2. Add the column to `$fillable` in the `Country` model
3. Update the seeder data array to include the new field for all countries
4. Add a cast if the field is JSON or boolean

**Updating country data**
- The seeder is idempotent — use `updateOrCreate` on ISO code, not plain `create`
- Never truncate the countries table in the seeder (host app may have foreign keys)
- Verify ISO 3166-1 alpha-2 and alpha-3 codes against the official standard

**Adding model scopes or helpers**
- Add scopes to the `Country` model (e.g., `scopeActive()`, `scopeByRegion()`)
- Keep the model lean — no business logic, only data access

### Testing
```sh
composer test:unit        # pest
composer test:types       # phpstan
composer test:lint        # pint
```

Test that the seeder runs idempotently:
```php
// Running twice should not create duplicates
CountriesSeeder::run();
CountriesSeeder::run();
expect(Country::count())->toBe(Country::count());
```

### Safe Operations
- Adding nullable columns to the migration
- Adding model scopes
- Updating country data in the seeder (use updateOrCreate)
- Adding tests

### Risky Operations — Confirm Before Doing
- Renaming the `iso2` or `iso3` columns (likely used as foreign keys in host apps)
- Changing column types (e.g., string length)
- Removing any country from the seeder dataset

### Do Not
- Use `truncate()` in the seeder
- Hardcode country lists in other packages — depend on this package instead
- Skip `declare(strict_types=1)` in any new file
