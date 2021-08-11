<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;

class CsrfTokenTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'csrfToken',
            'description' => 'Cross-site request forgery token.'
        ];
    }

    public function fields()
    {
        return [
            'Token' => ['type' => Type::string()],
        ];
    }
}
