<?php

namespace Edamam\Requests\FoodDatabase;

use Edamam\Abstracts\RequestorAbstract;

abstract class FoodDatabaseRequestor extends RequestorAbstract
{
    public static function getApiCredentials(): array
    {
        return FoodDatabase::getApiCredentials();
    }
}
