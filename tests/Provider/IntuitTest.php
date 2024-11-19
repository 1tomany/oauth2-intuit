<?php

namespace OneToMany\OAuth2\Client\Tests\Provider;

use League\OAuth2\Client\Token\AccessToken;
use OneToMany\OAuth2\Client\Provider\Intuit;
use PHPUnit\Framework\TestCase;

final class IntuitTest extends TestCase
{

    public function testGettingDefaultScopes(): void
    {
        $scopes = ['com.intuit.quickbooks.accounting'];

        $provider = new Intuit();

        $method = new \ReflectionMethod(
            $provider, 'getDefaultScopes'
        );

        $this->assertSame($scopes, $method->invoke($provider));
    }

    public function testCreatingResourceOwnerIsNotImplemented(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Unsupported by Intuit.');

        $accessToken = new AccessToken([
            'access_token' => 'fake-token'
        ]);

        $provider = new Intuit();

        $method = new \ReflectionMethod(
            $provider, 'createResourceOwner'
        );

        $method->setAccessible(true);
        $method->invoke($provider, [], $accessToken);
    }

}
