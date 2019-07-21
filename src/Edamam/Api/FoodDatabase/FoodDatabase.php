<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Abstracts\AuthenticatorAbstract;

class FoodDatabase extends AuthenticatorAbstract
{
    /**
     * Get the Parser instance.
     *
     * @return \Edamam\Api\FoodDatabase\Parser
     */
    public static function parser(): Parser
    {
        return Parser::instance();
    }

    /**
     * Get the Nutritients instance.
     *
     * @return \Edamam\Api\FoodDatabase\Nutrients
     */
    public static function nutrients(): Nutrients
    {
        return Nutrients::instance();
    }
}
