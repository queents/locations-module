# Vilt Locations

Database seeds for Locations Module for VILT stack

## Installation

You can install the package via composer:

```bash
composer require queents/locations-module
```

Add Module to `modules_statuses.json` if not exists

```json
{
    "Locations": true
}
```

Run Migration

```bash
php artisan migrate
```

Install the package

```bash
php artisan location:install
```

and now clear cache

```bash
php artisan optimize:clear
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Queen Tech Solutions](https://github.com/queents)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
