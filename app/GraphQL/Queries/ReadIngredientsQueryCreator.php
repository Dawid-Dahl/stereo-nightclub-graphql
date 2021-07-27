<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;
use SilverStripe\StereoNightclub\Ingredient;

class ReadIngredientsQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'readIngredients'
        ];
    }

    public function args()
    {
        return [
            'ID' => ['type' => Type::int()]
        ];
    }

    public function type()
    {
        return Type::listOf($this->manager->getType('ingredient'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        $ingredient = Ingredient::get();

        if (isset($args["ID"])) {
            return $ingredient->byID($args["ID"]);
        }

        return $ingredient;
    }
}
