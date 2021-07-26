<?php

namespace Guide\GraphQL;

use SilverStripe\StereoNightclub\Drink;
use SilverStripe\StereoNightclub\Ingredient;
use SilverStripe\Admin\ModelAdmin;

class DrinksAdmin extends ModelAdmin
{

    private static $managed_models = [
        Drink::class,
        Ingredient::class
    ];

    private static $url_segment = 'drinks';

    private static $menu_title = 'Drinks';

    private static $menu_icon_class = 'font-icon-list';
}
