# RC4/ARC4 encryption/decryption library for PHP.

[![Tests](https://github.com/felixdorn/php-rc4/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/felixdorn/php-rc4/actions/workflows/tests.yml)
[![Formats](https://github.com/felixdorn/php-rc4/actions/workflows/formats.yml/badge.svg?branch=main)](https://github.com/felixdorn/php-rc4/actions/workflows/formats.yml)
[![Version](https://poser.pugx.org/felixdorn/php-rc4/version)](//packagist.org/packages/felixdorn/php-rc4)
[![Total Downloads](https://poser.pugx.org/felixdorn/php-rc4/downloads)](//packagist.org/packages/felixdorn/php-rc4)
[![License](https://poser.pugx.org/felixdorn/php-rc4/license)](//packagist.org/packages/felixdorn/php-rc4)

## Installation

> Requires [PHP 8.3+](https://php.net/releases)

You can install the package via composer:

```bash
composer require felixdorn/php-rc4
```

## Usage

```php
$encrypted = \Felix\RC4\RC4::rc4('key', 'data')
$decrypted = \Felix\RC4\RC4::rc4('key', $encrypted);

// In tests
\Felix\RC4\RC4::fake(function ($key, $data) {
    // Fake it if you need to for some reason.
});

rc4('key', 'data'); // calls RC4::rc4

// Or, to be semantic:
$encrypted = rc4_encrypt('key', 'data');
$decrypted = rc4_decrypt('key', 'data');
// But both call rc4() under the hood
```

## Testing
```bash
composer test
```

**php-rc4** was created by **[Félix Dorn](https://felixdorn.fr)** under the **[MIT license](https://opensource.org/licenses/MIT)**.
