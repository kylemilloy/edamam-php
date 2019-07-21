<?php

namespace Edamam\Api\RecipeSearch;

use Edamam\Abstracts\RequestorAbstract;

class RecipeSearchRequestor extends RequestorAbstract
{
    public static function getApiCredentials(): array
    {
        return RecipeSearch::getApiCredentials();
    }
}
