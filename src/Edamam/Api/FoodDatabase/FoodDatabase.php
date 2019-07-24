<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Abstracts\AuthenticatorAbstract;

class FoodDatabase extends AuthenticatorAbstract
{
    /**
     * Get the Recipe instance.
     *
     * @return \Edamam\Api\FoodDatabase\FoodRequest
     */
    public static function search(): FoodRequest
    {
        return FoodRequest::create();
    }

    /**
     * Get the Food instance.
     *
     * @return \Edamam\Api\FoodDatabase\NutrientRequest
     */
    public static function nutrients(): NutrientRequest
    {
        return NutrientRequest::create();
    }
}
