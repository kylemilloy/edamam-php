<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Abstracts\AuthenticatorAbstract;

class FoodDatabase extends AuthenticatorAbstract
{
    /**
     * Get the FoodRequest instance.
     *
     * @return \Edamam\Api\FoodDatabase\FoodRequest
     */
    public static function parser(): FoodRequest
    {
        return FoodRequest::instance();
    }

    /**
     * Get the Nutritients instance.
     *
     * @return \Edamam\Api\FoodDatabase\NutrientRequest
     */
    public static function nutrients(): NutrientRequest
    {
        return NutrientRequest::instance();
    }
}
