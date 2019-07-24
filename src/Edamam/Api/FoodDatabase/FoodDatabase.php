<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Api\Authenticator;

class FoodDatabase extends Authenticator
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
