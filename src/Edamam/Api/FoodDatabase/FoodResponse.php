<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Models\Food;
use Edamam\Api\Response;

class FoodResponse extends Response
{
    /**
     * The parsed food result.
     *
     * @var \Edamam\Models\Food
     */
    protected $parsed;

    /**
     * An array of possible foods.
     *
     * @var \Edamam\Models\Food[]
     */
    protected $hints;

    /**
     * Process the response.
     */
    protected function process(): void
    {
        $this->parsed = Food::create($this->data['parsed']);

        $this->hints = array_map(function ($hint) {
            return Food::create($hint['food']);
        }, $this->data['hints']);
    }

    /**
     * Return the primary response value.
     *
     * @return mixed
     */
    public function results()
    {
        return $this->parsed;
    }

    /**
     * Return the additional food hints.
     *
     * @return array|null
     */
    public function hints(): ?array
    {
        return $this->hints;
    }
}
