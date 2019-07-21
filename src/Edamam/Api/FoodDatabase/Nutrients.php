<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Interfaces\InstantiatorInterface;

class Nutrients extends FoodDatabaseRequestor implements InstantiatorInterface
{
    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [
        'yield',
        'ingredients',
    ];

    /**
     * Number of servings.
     *
     * @var float
     */
    protected $yield;

    /**
     * The ingredient to search nutritents for.
     *
     * @var array
     */
    protected $ingredient = [];

    /**
     * The food ID to look up.
     *
     * @var string
     */
    protected $id;

    /**
     * The Measurement URI to use.
     *
     * @var string
     */
    protected $measurement;

    /**
     * The quantity to use.
     *
     * @return float
     */
    protected $quantity;

    /**
     * Return the instance.
     *
     * @return \Edamam\Interfaces\InstantiatorInterface
     */
    public static function instance(): InstantiatorInterface
    {
        return new self();
    }

    public function yield(?float $yield = null)
    {
        if (1 === func_num_args()) {
            return $this->yield = $yield;

            return $this;
        }

        return $this->yield;
    }

    public function id(?string $id = null)
    {
        if (1 === func_num_args()) {
            return $this->id = $id;

            return $this;
        }

        return $this->id;
    }

    public function quantity(?float $quantity = null)
    {
        if (1 === func_num_args()) {
            return $this->quantity = $quantity;

            return $this;
        }

        return $this->quantity;
    }

    public function measurement(?string $measurement = null)
    {
        if (1 === func_num_args()) {
            return $this->measurement = $measurement;

            return $this;
        }

        return $this->measurement;
    }

    public function ingredient(?array $ingredient = null)
    {
        if (1 === func_num_args()) {
            return $this->setIngredient($ingredient);
        }

        return $this->ingredient;
    }

    protected function setIngredient(array $ingredient)
    {
        if (isset($ingredient['id'])) {
            $this->id($ingredient['id']);
        }

        if (isset($ingredient['quantity'])) {
            $this->quantity($ingredient['quantity']);
        }

        if (isset($ingredient['measurement'])) {
            $this->measurement($ingredient['measurement']);
        }

        return $this;
    }

    /**
     * Validate the search query.
     *
     * @throws \Exception
     */
    protected function validate()
    {
        if (!$this->id() && !$this->quantity() && !$this->measurement()) {
            throw new \Exception('You must enter a food ID, quantity and measurement URI.');
        }
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    protected function getRequestPath()
    {
        return '/api/food-database/nutrients';
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->filterQueryParameters([
            'yield' => $this->yield(),
            'ingredients' => [
                'foodId' => $this->id(),
                'quantity' => $this->quantity(),
                'measureURI' => $this->measurement(),
            ],
        ]);
    }
}
