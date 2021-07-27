<?php

namespace SilverStripe\StereoNightclub\GraphQL;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use SilverStripe\GraphQL\TypeCreator;
use SilverStripe\GraphQL\Pagination\Connection;

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
        $ingredientsConnection = Connection::create("Ingredients")
            ->setConnectionType($this->manager->getType("ingredient"))
            ->setDescription("A list of the drink's ingredients")
            ->setSortableFields(["ID", "Title"]);

        return [
            'ID' => ['type' => Type::nonNull(Type::id())],
            'Title' => ['type' => Type::string()],
            'Description' => ['type' => Type::string()],
            'Image' => ['type' => Type::string()],
            'Price' => ['type' => Type::float()],
            'LastEdited' => ['type' => Type::string()],
            'Created' => ['type' => Type::string()],
            'Ingredients' => [
                'type' => $ingredientsConnection->toType(),
                'args' => $ingredientsConnection->args(),
                'resolve' => function ($object, array $args, $context, ResolveInfo $info) use ($ingredientsConnection) {
                    return $ingredientsConnection->resolveList(
                        $object->Ingredients(),
                        $args,
                        $context,
                        $info
                    );
                }
            ]
        ];
    }
}
