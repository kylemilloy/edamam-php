<?php

namespace Edamam\Requests\FoodDatabase;

use Edamam\Abstracts\AuthenticatorAbstract;

class FoodDatabase extends AuthenticatorAbstract
{
    /**
     * Get the Parser instance.
     *
     * @return \Edamam\Requests\FoodDatabase\Parser
     */
    public static function parser(): Parser
    {
        return Parser::instance();
    }

    /**
     * Get the Nutritients instance.
     *
     * @return \Edamam\Requests\FoodDatabase\Nutrients
     */
    public static function nutrients(): Nutrients
    {
        return Nutrients::instance();
    }
}
