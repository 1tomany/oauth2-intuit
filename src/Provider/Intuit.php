<?php

namespace OneToMany\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Intuit extends AbstractProvider
{

    use BearerAuthorizationTrait;

    public function getBaseAuthorizationUrl(): string
    {
        return 'https://appcenter.intuit.com/connect/oauth2';
    }

    /**
     * @param array<string, string> $params
     */
    public function getBaseAccessTokenUrl(array $params): string
    {
        return 'https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token): ?string
    {
        return null;
    }

    /**
     * @return list<string>
     */
    protected function getDefaultScopes(): array
    {
        return ['com.intuit.quickbooks.accounting'];
    }

    protected function getScopeSeparator(): string
    {
        return ' ';
    }

    /**
     * @param  array<string, string> $data
     */
    protected function checkResponse(ResponseInterface $response, $data): void
    {
        if (isset($data['error'])) {
            throw new IdentityProviderException($data['error_description'] ?? $data['error'], $response->getStatusCode(), $response);
        }
    }

    /**
     * @param array<string, string> $response
     */
    protected function createResourceOwner(array $response, AccessToken $token): never
    {
        throw new \BadMethodCallException('Unsupported by Intuit.');
    }

}
