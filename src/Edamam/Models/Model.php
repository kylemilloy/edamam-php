<?php

namespace Edamam\Models;

use ReflectionClass;

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
        if ($this->allowed($name)) {
            return method_exists($this, $method = 'get'.ucfirst($name).'Attribute')
                ? $this->{$method}()
                : $this->{$name};
        }

        return null;
    }

    public function __set(string $name, $value): void
    {
        if ($this->allowed($name)) {
            if (method_exists($this, $method = 'set'.ucfirst($name).'Attribute')) {
                $this->{$method}($value);
            } else {
                $this->{$name} = $value;
            }
        }
    }

    /**
     * Cast to array and stringify.
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * Build the model.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        foreach ($values as $key => $value) {
            if ($this->allowed($key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Create a new instance.
     *
     * @param array $values
     *
     * @return self
     */
    public static function create(array $values): self
    {
        return new self($values);
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
        return (new ReflectionClass($this))->getShortName();
    }

    /**
     * Transform to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_map(function ($key) {
            return $this->{$key};
        }, $this->allowed);
    }
}
