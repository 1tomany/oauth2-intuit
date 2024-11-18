<?php

namespace OneToMany\OAuth2\Provider;

class ResourceOwnerNotImplementedException extends \RuntimeException
{

    public function __construct()
    {
        parent::__construct("Intuit's OAuth 2.0 implementation does not support fetching the resource owner.");
    }

}
