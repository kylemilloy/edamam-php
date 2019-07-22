<?php

namespace Edamam\Api\RecipeSearch;

use Edamam\Abstracts\RequestAbstract;

abstract class RecipeSearchRequestor extends RequestAbstract
{
    public static function getApiCredentials(): array
    {
        return RecipeSearch::getApiCredentials();
    }
}
