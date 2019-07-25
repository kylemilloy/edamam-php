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
}
