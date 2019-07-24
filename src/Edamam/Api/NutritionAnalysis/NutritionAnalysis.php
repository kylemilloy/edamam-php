<?php

namespace Edamam\Api\NutritionAnalysis;

use Edamam\Api\Authenticator;

class NutritionAnalysis extends Authenticator
{
    /**
     * Get the Recipe instance.
     *
     * @return \Edamam\Api\NutritionAnalysis\Recipe
     */
    public static function recipe(): Recipe
    {
        return Recipe::create();
    }

    /**
     * Get the Food instance.
     *
     * @return \Edamam\Api\NutritionAnalysis\Food
     */
    public static function food(): Food
    {
        return Food::create();
    }
}
