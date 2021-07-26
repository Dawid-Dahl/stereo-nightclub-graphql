<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;

class DrinkTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'drink',
            'description' => 'Add a description...'
        ];
    }

    public function fields()
    {
        return [
            'ID' => ['type' => Type::nonNull(Type::id())],
            'Title' => ['type' => Type::string()],
            'Description' => ['type' => Type::string()],
            'Image' => ['type' => Type::string()],
            'Price' => ['type' => Type::float()],
        ];
    }
}
