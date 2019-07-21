<?php

namespace Edamam;

use Edamam\Api\FoodDatabase\Food;
use Edamam\Api\RecipeSearch\Recipe;
use Edamam\Api\NutritionAnalysis\Nutrition;

class Edamam
{
    /**
     * Return a Food API instance.
     *
     * @return \Edamam\Api\Food
     */
    public static function food()
    {
        return Food::instance();
    }

    /**
     * Return a Food API instance.
     *
     * @return \Edamam\Api\Food
     */
    public static function nutrition()
    {
        return Nutrition::instance();
    }

    /**
     * Return a Food API instance.
     *
     * @return \Edamam\Api\Food
     */
    public static function recipe()
    {
        return Recipe::instance();
    }
}
