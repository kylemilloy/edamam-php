<?php

namespace Edamam\Abstracts;

use Edamam\Api\RecipeSearch\RecipeSearch;

abstract class RecipeSearchRequest extends RequestAbstract
{
    public static function getAuthenticationParameters(): array
    {
        return RecipeSearch::getApiCredentials();
    }
}
