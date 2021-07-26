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
use SilverStripe\Forms\TabSet;

class Ingredient extends DataObject
{

    private static $db = [
        'Title' => 'Varchar',
        'Price' => 'Int',
    ];

    private static $belongs_many_many = [
        'Drinks' => Drink::class,
    ];

    private static $table_name = "Ingredient";

    public function getCMSfields()
    {
    }
}
