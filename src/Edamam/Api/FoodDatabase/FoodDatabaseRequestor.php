<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Abstracts\RequestorAbstract;

class FoodDatabaseRequestor extends RequestorAbstract
{
    public static function getApiCredentials(): array
    {
        return FoodDatabase::getApiCredentials();
    }
}
