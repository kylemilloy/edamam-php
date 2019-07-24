<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Api\Request;

class FoodDatabaseRequest extends Request
{
    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getAuthenticationParameters(): array
    {
        return FoodDatabase::getApiCredentials();
    }
}
