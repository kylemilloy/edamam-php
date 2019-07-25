<?php

namespace Edamam\Interfaces;

interface RepositoryInterface
{
    /**
     * Process and cast data if necessary.
     *
     * @param array $data
     *
     * @return array
     */
    public function process(array $data);

    /**
     * Instantiate the instance.
     *
     * @param array $data
     *
     * @return static
     */
    public static function create(array $data = []);

    /**
     * Return the value from the collection.
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function all(): Collection;

    /**
     * Return the value from the collection.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key);

    /**
     * Cast to array.
     *
     * @return array
     */
    public function toArray();

    /**
     * Cast to JSON.
     *
     * @return string
     */
    public function toJson();
}
