<?php

namespace Edamam\Api\RecipeSearch;

use Edamam\Api\Request;

class RecipeSearchRequest extends Request
{
    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getAuthenticationParameters(): array
    {
        return RecipeSearch::getApiCredentials();
    }
}
