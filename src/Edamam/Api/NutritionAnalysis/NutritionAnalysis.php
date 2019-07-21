<?php

namespace Edamam\Api\NutritionAnalysis;

use Edamam\Abstracts\AuthenticatorAbstract;

class NutritionAnalysis extends AuthenticatorAbstract
{
    /**
     * Get the Parser instance.
     *
     * @return Edamam\Api\NutritionAnalysis\Recipe
     */
    public static function recipe(): Recipe
    {
        return Recipe::instance();
    }
}
