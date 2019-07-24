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
    public function __construct(array $data = [])
    {
        $this->collection = Collection::make($this->process($data));
    }

    /**
     * Process and cast data if necessary.
     *
     * @param array $data
     *
     * @return array
     */
    protected function process(array $data)
    {
        return $data;
    }

    /**
     * Instantiate the instance.
     *
     * @param array $data
     *
     * @return static
     */
    public static function create(array $data = [])
    {
        return new static($data);
    }

    /**
     * Return the value from the collection.
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function all(): Collection
    {
        return $this->collection;
    }

    /**
     * Return the value from the collection.
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->collection->get($key);
    }

    /**
     * Cast to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->all()->toArray();
    }

    /**
     * Cast to JSON.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
