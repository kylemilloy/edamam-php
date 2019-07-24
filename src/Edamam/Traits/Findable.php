<?php

namespace Edamam\Traits;

trait Findable
{
    /**
     * Quickly execute a request to the database.
     *
     * @param array $parameters
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public static function find(array $parameters)
    {
        return (new static($parameters))
            ->fetch()
            ->response();
    }
}
