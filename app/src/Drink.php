<?php

namespace SilverStripe\StereoNightclub;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\CurrencyField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\ArrayLib;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TabSet;

class Drink extends DataObject
{

    private static $db = [
        'Title' => 'Varchar',
        'Description' => 'HTMLText',
        'Image' => 'Varchar',
        'Price' => 'Int',
        'FeaturedOnHomepage' => 'Boolean'
    ];

    /* private static $has_one = [
        'Image' => Image::class,
    ]; */

    private static $many_many = [
        'Ingredients' => Ingredient::class,
    ];

    private static $table_name = "Drink";

    public function getCMSfields()
    {
    }
}
