<?php

namespace Edamam\Interfaces;

interface Instantiable
{
    /**
     * Returns the instance of itself.
     *
     * @return self
     */
    public static function instance(): self;
}
