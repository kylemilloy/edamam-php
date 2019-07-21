<?php

namespace Edamam;

use Edamam\Api\Food;

class Edamam
{
    /**
     * Return a Food API instance.
     *
     * @return \Edamam\Api\Food
     */
    public static function food()
    {
        return Food::instance();
    }
}
