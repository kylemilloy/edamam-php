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
    public static function query(array $parameters)
    {
        return (new static($parameters))
            ->fetch()
            ->response();
    }

    /**
     * Quickly execute a request to the database.
     *
     * @param array $parameters
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public static function find(array $parameters)
    {
        return (new static($parameters))
            ->fetch()
            ->response()
            ->results();
    }
}
