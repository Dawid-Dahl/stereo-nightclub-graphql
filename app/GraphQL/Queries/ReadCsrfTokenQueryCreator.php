<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;
use SilverStripe\Security\SecurityToken;

class ReadCsrfTokenQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'readCsrfToken'
        ];
    }

    public function type()
    {
        return Type::listOf($this->manager->getType('csrfToken'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $token = SecurityToken::inst()->getValue();

        if (!isset($token)) {
            return null;
        }

        return $token;
    }
}
