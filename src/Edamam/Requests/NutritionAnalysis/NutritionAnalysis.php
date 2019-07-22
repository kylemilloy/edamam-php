<?php

namespace Edamam\Requests\NutritionAnalysis;

use Edamam\Abstracts\AuthenticatorAbstract;

class NutritionAnalysis extends AuthenticatorAbstract
{
    /**
     * Get the Recipe instance.
     *
     * @return \Edamam\Requests\NutritionAnalysis\Recipe
     */
    public static function recipe(): Recipe
    {
        return Recipe::instance();
    }

    /**
     * Get the Food instance.
     *
     * @return \Edamam\Requests\NutritionAnalysis\Food
     */
    public static function food(): Food
    {
        return Food::instance();
    }
}
