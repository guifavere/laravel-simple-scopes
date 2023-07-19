# laravel simple scopes

Provides some useful scopes, and custom queries for laravel projects. This project was inspired in the package: [laracraft-tech/laravel-date-scopes](https://github.com/laracraft-tech/laravel-date-scopes).

## Installation

You can install via composer:

```bash
composer require guifavere/laravel-simple-scopes
```

## How it works

Currently there are only scopes, and custom queries for dates. They are:
```php
createdFrom::('2023-12-06');
createdTo::('2023-12-06');
modifiedFrom::('2023-12-06');
modifiedTo::('2023-12-06');
```

You can use the trait: `DateScopes` inside the eloquent models, or the: `DateQueries` for the custom query builders.

**Examples:**

```php
use GuiFavere\LaravelSimpleScopes\Dates\DateScopes;

class Resource extends Model
{
    use DateScopes;
}
```

```php
use GuiFavere\LaravelSimpleScopes\Dates\DateQueries;

class ResourceQueryBuilder extends Builder
{
    use DateQueries;
}
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT).
