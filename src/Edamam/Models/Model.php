<?php

namespace Edamam\Models;

class Model
{
    /**
     * The values that are mass-assignable.
     *
     * @var array
     */
    protected $allowed = [];

    /**
     * Find the instance's property or return null.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        if ($method = $this->retrieveGetMutator($name)) {
            return $this->{$method}();
        }

        return $this->{$name};
    }

    /**
     * Cast to array and stringify.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * Build the model.
     *
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        foreach ($values as $key => $value) {
            if ($this->allowed($key)) {
                if ($method = $this->retrieveSetMutator($key)) {
                    $this->{$key} = $this->{$method}($value);
                    continue;
                }

                $this->{$key} = $value;
            }
        }
    }

    /**
     * Returns the set mutator if available.
     *
     * @param string $key
     *
     * @return string|null
     */
    public function retrieveGetMutator(string $key): ?string
    {
        if (method_exists($this, $method = 'get'.ucfirst($key).'Attribute')) {
            return $method;
        }

        return null;
    }

    /**
     * Returns the set mutator if available.
     *
     * @param string $key
     *
     * @return string|null
     */
    public function retrieveSetMutator(string $key): ?string
    {
        if (method_exists($this, $method = 'set'.ucfirst($key).'Attribute')) {
            return $method;
        }

        return null;
    }

    /**
     * Create a new instance.
     *
     * @param array $values
     *
     * @return static
     */
    public static function create(array $values)
    {
        return new static($values);
    }

    /**
     * Check if the property is allowed to be mass-assigned.
     *
     * @param string $key
     *
     * @return bool
     */
    protected function allowed(string $key): bool
    {
        return in_array($key, $this->allowed);
    }

    /**
     * Return the class name.
     *
     * @return string
     */
    public function getModel()
    {
        return get_class(new static());
    }

    /**
     * Convert to json string.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Transform to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $arr = [];

        foreach ($this->allowed as $key) {
            $arr[$key] = $this->{$key};
        }

        return $arr;
    }
}
