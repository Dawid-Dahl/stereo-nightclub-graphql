<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\OperationResolver;
use SilverStripe\GraphQL\QueryCreator;
use SilverStripe\StereoNightclub\Drink;

class ReadDrinksQueryCreator extends QueryCreator implements OperationResolver
{
    public function attributes()
    {
        return [
            'name' => 'readDrinks'
        ];
    }

    public function type()
    {
        return Type::listOf($this->manager->getType('drink'));
    }

    public function resolve($object, array $args, $context, ResolveInfo $info)
    {
        return Drink::get();
    }
}
