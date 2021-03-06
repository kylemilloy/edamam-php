<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Models\Food;
use Edamam\Api\Response;
use Tightenco\Collect\Support\Arr;
use Tightenco\Collect\Support\Collection;

class FoodResponse extends Response
{
    /**
     * Process the response.
     */
    protected function setResultsAttribute(): void
    {
        $this->results = Collection::make(
            $this->extractData()
        )->mapInto(Food::class);
    }

    /**
     * Extract the "hints" results.
     *
     * @return array|null
     */
    protected function extractData()
    {
        return array_map(function ($arr) {
            return Arr::get($arr, 'food');
        }, Arr::get($this->data, 'hints'));
    }
}
