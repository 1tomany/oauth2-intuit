<?php

namespace OneToMany\OAuth2\Intuit\Tests\Provider;

use League\OAuth2\Client\Token\AccessToken;
use OneToMany\OAuth2\Intuit\Provider\Intuit;
use OneToMany\OAuth2\Intuit\Provider\ResourceOwnerNotImplementedException;
use PHPUnit\Framework\TestCase;

final class IntuitTest extends TestCase
{

    public function testCreatingResourceOwnerIsNotImplemented(): void
    {
        $this->expectException(ResourceOwnerNotImplementedException::class);

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
