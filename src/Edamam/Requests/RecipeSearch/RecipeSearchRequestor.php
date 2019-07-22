<?php

namespace Edamam\Requests\RecipeSearch;

use Edamam\Abstracts\RequestorAbstract;

abstract class RecipeSearchRequestor extends RequestorAbstract
{
    public static function getApiCredentials(): array
    {
        return RecipeSearch::getApiCredentials();
    }
}
