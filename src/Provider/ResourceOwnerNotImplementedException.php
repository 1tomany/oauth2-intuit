<?php

namespace OneToMany\OAuth2\Intuit\Provider;

class ResourceOwnerNotImplementedException extends \RuntimeException
{

    public function __construct()
    {
        parent::__construct('Intuit does not support fetching the resource owner.');
    }

}
