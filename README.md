# A Laravel wrapper for Domain Information Groper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marjose123/dig.svg?style=flat-square)](https://packagist.org/packages/marjose123/dig)
[![GitHub Tests Action Status](https://github.com/spatie/package-dig-laravel/actions/workflows/run-tests.yml/badge.svg)](https://github.com/marjose123/dig/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://github.com/spatie/package-dig-laravel/actions/workflows/fix-php-code-style-issues.yml/badge.svg)](https://github.com/marjose123/dig/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/marjose123/dig.svg?style=flat-square)](https://packagist.org/packages/marjose123/dig)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/Dig.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/Dig)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require marjose123/dig
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="dig-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="dig-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="dig-views"
```

## Usage

```php
$dig = new Marjose123\Dig();
echo $dig->echoPhrase('Hello, Marjose123!');
```

## Testing

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

- [Marjose Darang](https://github.com/MarJose123)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
