<?php

namespace Edamam\Interfaces;

interface RepositoryInterface
{
    /**
     * Return the value from the collection.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key);
}
