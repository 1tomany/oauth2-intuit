# Intuit Provider for OAuth 2.0 Client

This package provides Intuit OAuth 2.0 support for The PHP League's [OAuth 2.0 Client](https://github.com/thephpleague/oauth2-client).


## Installation

```
composer require 1tomany/oauth2-intuit
```


## Usage

Usage is the similar as [The PHP League's OAuth `GenericProvider`](https://oauth2-client.thephpleague.com/usage/), using `\OneToMany\OAuth2\Client\Provider\Intuit` as the provider.

```php
$provider = new OneToMany\OAuth2\Client\Provider\Intuit([
    'clientId' => 'intuit-client-id',
    'clientSecret' => 'intuit-client-secret',
    'redirectUri' => 'https://example.com/oauth/connect'
]);
```

The provider will use `com.intuit.quickbooks.accounting` as the default scope if the `scopes` key is not provided as part of the constructor parameters.

## Testing

``` bash
./vendor/bin/phpunit
```


## Credits

- [Vic Cherubini](https://github.com/viccherubini), [1:N Labs, LLC](https://1tomany.com)


## License

The MIT License
