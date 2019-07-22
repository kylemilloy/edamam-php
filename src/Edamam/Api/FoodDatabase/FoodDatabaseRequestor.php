<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Abstracts\RequestAbstract;

abstract class FoodDatabaseRequestor extends RequestAbstract
{
    public static function getApiCredentials(): array
    {
        return FoodDatabase::getApiCredentials();
    }
}
