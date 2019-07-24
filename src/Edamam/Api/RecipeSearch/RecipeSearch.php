<?php

namespace Edamam\Api\RecipeSearch;

use Edamam\Abstracts\AuthenticatorAbstract;

class RecipeSearch extends AuthenticatorAbstract
{
    /**
     * Get the FoodRequest instance.
     *
     * @return \Edamam\Api\RecipeSearch\Search
     */
    public static function search(): Search
    {
        return Search::create();
    }
}
