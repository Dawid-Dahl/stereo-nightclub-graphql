<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use SilverStripe\Security\SecurityToken;

class MyResolver
{
    public static function resolveCsrfToken(): ?string
    {
        $token = SecurityToken::inst()->getValue();

        if (!isset($token)) {
            return null;
        }

        return $token;
    }
}
