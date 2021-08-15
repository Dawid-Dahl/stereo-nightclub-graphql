<?php

namespace SilverStripe\StereoNightclub;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\ORM\ArrayLib;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextareaField;

class Drink extends DataObject
{

    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'HTMLText',
        'Image' => 'Varchar',
        'Price' => 'Currency',
    ];

    /* private static $has_one = [
        'Image' => Image::class,
    ]; */

    private static $many_many = [
        'Ingredients' => Ingredient::class,
    ];

    private static $table_name = "Drink";

    private static $summary_fields = [
        'Title' => 'Title',
        'Description' => 'Description',
        'Price' => 'Price',
        'Created' => 'Created',
    ];

    public function getCMSfields()
    {
        $fields = FieldList::create(TabSet::create("Root"));

        $fields->addFieldsToTab(
            "Root.Main",
            [
                TextField::create("Title"),
                TextareaField::create("Description"),
                TextField::create("Image"),
                CurrencyField::create("Price", "Price (per drink)"),
                CheckboxSetField::create(
                    'Ingredients',
                    'Selected ingredients',
                    Ingredient::get()->map()
                )
            ]
        );

        return $fields;
    }
}
