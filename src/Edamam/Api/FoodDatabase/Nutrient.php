<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Support\Measurement;
use Edamam\Abstracts\ApiRequest;

class Nutrient extends ApiRequest
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
     * @var int
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
    protected $foodId;

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

    public function instance()
    {
        return new self();
    }

    /**
     * Validate the search query.
     *
     * @throws \Exception
     */
    protected function validate()
    {
        if (!$this->foodId() && !$this->quantity() && !$this->measurement()) {
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
}
