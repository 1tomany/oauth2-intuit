# Intuit Provider for OAuth 2.0 Client

This package provides Intuit OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).


## Installation

```
composer require 1tomany/oauth2-intuit
```


## Usage

```php
$provider = new OneToMany\OAuth2\Provider\Intuit([
    'clientId' => 'intuit-client-id',
    'clientSecret' => 'intuit-client-secret',
    'redirectUri' => 'https://example.com/oauth/connect'
]);

```


## Testing

``` bash
./vendor/bin/phpunit
```


## Credits

- [Vic Cherubini](https://github.com/viccherubini), [1:N Labs, LLC](https://1tomany.com)


## License

The MIT License (MIT). Please see [License File](https://github.com/1tomany/oauth2-intuit/blob/main/LICENSE) for more information.
