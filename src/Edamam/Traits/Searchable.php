<?php

namespace Edamam\Traits;

trait Searchable
{
    /**
     * Quickly execute a request to the database.
     *
     * @param array $parameters
     *
     * @return mixed
     */
    public static function find(array $parameters)
    {
        return (new self($parameters))->results();
    }
}
