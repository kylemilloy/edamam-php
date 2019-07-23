<?php

namespace Edamam\Abstracts;

use Edamam\Api\FoodDatabase\FoodDatabase;

abstract class FoodDatabaseRequest extends RequestAbstract
{
    public static function getAuthenticationParameters(): array
    {
        return FoodDatabase::getApiCredentials();
    }
}
