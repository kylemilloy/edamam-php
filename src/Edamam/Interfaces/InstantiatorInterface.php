<?php

namespace Edamam\Interfaces;

interface InstantiatorInterface
{
    /**
     * Returns the instance of itself.
     *
     * @return self
     */
    public static function instance(): InstantiatorInterface;
}
