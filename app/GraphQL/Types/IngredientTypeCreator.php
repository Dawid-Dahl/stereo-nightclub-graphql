<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;

class IngredientTypeCreator extends TypeCreator
{
    public function attributes()
    {
        return [
            'name' => 'ingredient',
            'description' => 'Add a description...'
        ];
    }

    public function fields()
    {
        return [
            'ID' => ['type' => Type::nonNull(Type::id())],
            'Title' => ['type' => Type::string()],
            'Price' => ['type' => Type::float()],
        ];
    }
}
