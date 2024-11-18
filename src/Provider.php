<?php

namespace OneToMany\OAuth2\Intuit;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericResourceOwner;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Provider extends AbstractProvider
{

    use BearerAuthorizationTrait;

    public function getBaseAuthorizationUrl(): string
    {
        return 'https://appcenter.intuit.com/connect/oauth2';
    }

    public function getBaseAccessTokenUrl(array $params): string
    {
        return 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token): ?string
    {
        return null;
    }

    protected function getDefaultScopes(): array
    {
        return ['com.intuit.quickbooks.accounting'];
    }

    protected function checkResponse(ResponseInterface $response, $data): void
    {
        if (isset($data['error'], $data['error_description'])) {
            throw new IdentityProviderException($data['error_description'], $response->getStatusCode(), $response);
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token): GenericResourceOwner
    {
        return new GenericResourceOwner($response, 'id');
    }

}
