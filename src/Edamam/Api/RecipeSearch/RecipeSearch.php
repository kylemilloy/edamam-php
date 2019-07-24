<?php

namespace Edamam\Api\RecipeSearch;

use Edamam\Api\Authenticator;

class RecipeSearch extends Authenticator
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
