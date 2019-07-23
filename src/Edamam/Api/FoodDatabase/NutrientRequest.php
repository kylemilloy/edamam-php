<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Traits\Searchable;
use Edamam\Traits\Instantiable;
use Edamam\Abstracts\FoodDatabaseRequest;

class NutrientRequest extends FoodDatabaseRequest
{
    use Searchable;
    use Instantiable;

    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [
        'yield',
        'ingredient',
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
     * Get/set the yield.
     *
     * @param float|null $yield
     *
     * @return mixed
     */
    public function yield(?float $yield = null)
    {
        if (1 === func_num_args()) {
            $this->yield = $yield;

            return $this;
        }

        return $this->yield;
    }

    /**
     * Get/set the ingredient id.
     *
     * @param string|null $id
     *
     * @return mixed
     */
    public function id(?string $id = null)
    {
        if (1 === func_num_args()) {
            $this->id = $this->ingredient['id'] = $this->ingredient['id'] = $id;

            return $this;
        }

        return $this->id;
    }

    /**
     * Get/set the ingredient quantity.
     *
     * @param float|null $quantity
     *
     * @return mixed
     */
    public function quantity(?float $quantity = null)
    {
        if (1 === func_num_args()) {
            $this->quantity = $this->ingredient['quantity'] = $quantity;

            return $this;
        }

        return $this->quantity;
    }

    /**
     * Get/set the ingredient measurement.
     *
     * @param string|null $measurement
     *
     * @return mixed
     */
    public function measurement(?string $measurement = null)
    {
        if (1 === func_num_args()) {
            $this->measurement = $this->ingredient['measurement'] = $measurement;

            return $this;
        }

        return $this->measurement;
    }

    /**
     * Get/set the ingredient.
     *
     * @param array|null $ingredient
     *
     * @return mixed
     */
    public function ingredient(?array $ingredient = null)
    {
        if (1 === func_num_args()) {
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

        return $this->ingredient;
    }

    /**
     * Validate the search query.
     *
     * @throws \Exception
     */
    public function validate()
    {
        if ($this->id() && $this->quantity() && $this->measurement()) {
            return;
        }

        throw new \Exception('You must enter a food ID, quantity and measurement URI.');
    }

    /**
     * Return the request's method.
     *
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'POST';
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    public function getRequestPath(): string
    {
        return '/api/food-database/nutrients';
    }

    /**
     * Get the json body parameters to send on the request.
     *
     * @return array
     */
    public function getBodyParameters(): array
    {
        return $this->filterParameters([
            'yield' => $this->yield(),
            'ingredients' => [[
                'foodId' => $this->id(),
                'quantity' => $this->quantity(),
                'measureURI' => $this->measurement(),
            ]],
        ]);
    }
}
