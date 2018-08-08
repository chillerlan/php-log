# chillerlan/php-log

A cheap psr/logger-interface implementation. PHP 7.2+

[![version][packagist-badge]][packagist]
[![license][license-badge]][license]
[![Travis][travis-badge]][travis]
[![Coverage][coverage-badge]][coverage]
[![Scrunitizer][scrutinizer-badge]][scrutinizer]
[![Packagist downloads][downloads-badge]][downloads]
[![PayPal donate][donate-badge]][donate]

[packagist-badge]: https://img.shields.io/packagist/v/chillerlan/php-log.svg?style=flat-square
[packagist]: https://packagist.org/packages/chillerlan/php-log
[license-badge]: https://img.shields.io/github/license/chillerlan/php-log.svg?style=flat-square
[license]: https://github.com/chillerlan/php-log/blob/master/LICENSE.md
[travis-badge]: https://img.shields.io/travis/chillerlan/php-log.svg?style=flat-square
[travis]: https://travis-ci.org/chillerlan/php-log
[coverage-badge]: https://img.shields.io/codecov/c/github/chillerlan/php-log.svg?style=flat-square
[coverage]: https://codecov.io/github/chillerlan/php-log
[scrutinizer-badge]: https://img.shields.io/scrutinizer/g/chillerlan/php-log.svg?style=flat-square
[scrutinizer]: https://scrutinizer-ci.com/g/chillerlan/php-log
[downloads-badge]: https://img.shields.io/packagist/dt/chillerlan/php-log.svg?style=flat-square
[downloads]: https://packagist.org/packages/chillerlan/php-log/stats
[donate-badge]: https://img.shields.io/badge/donate-paypal-ff33aa.svg?style=flat-square
[donate]: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WLYUNAT9ZTJZ4

## Documentation

### Installation
**requires [composer](https://getcomposer.org)**

*composer.json* (note: replace `dev-master` with a version boundary)
```json
{
	"require": {
		"php": ">=7.2.0",
		"chillerlan/php-log": "^2.0"
	}
}
```

#### Manual installation
Download the desired version of the package from [master](https://github.com/chillerlan/php-log/archive/master.zip) or 
[release](https://github.com/chillerlan/php-log/releases) and extract the contents to your project folder.  After that:
- run `composer install` to install the required dependencies and generate `/vendor/autoload.php`.
- if you use a custom autoloader, point the namespace `chillerlan\Logger` to the folder `src` of the package 

Profit!

### Usage
- @todo
