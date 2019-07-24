<?php

namespace Edamam\Repositories;

use Tightenco\Collect\Support\Collection;
use Edamam\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    /**
     * The collection of data.
     *
     * @var \Tightenco\Collect\Support\Collection
     */
    protected $collection;

    /**
     * Instantiate the instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->collection = Collection::make($data);
    }

    /**
     * Instantiate the instance.
     *
     * @param array $data
     *
     * @return static
     */
    public static function create(array $data)
    {
        return new static($data);
    }

    /**
     * Return the value from the collection.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->collection->get($key);
    }
}
