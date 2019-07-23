<?php

namespace Edamam\Traits;

trait Instantiable
{
    public static function instance(array $parameters = [])
    {
        return new self($parameters);
    }
}
