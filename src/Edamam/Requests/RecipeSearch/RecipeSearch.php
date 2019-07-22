<?php

namespace Edamam\Requests\RecipeSearch;

use Edamam\Abstracts\AuthenticatorAbstract;

class RecipeSearch extends AuthenticatorAbstract
{
    /**
     * Get the Parser instance.
     *
     * @return \Edamam\Requests\RecipeSearch\Search
     */
    public static function search(): Search
    {
        return Search::instance();
    }
}
