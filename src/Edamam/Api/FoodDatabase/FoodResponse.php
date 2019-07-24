<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Models\Food;
use Edamam\Api\Response;
use Tightenco\Collect\Support\Collection;
use Tightenco\Collect\Support\Arr;

class FoodResponse extends Response
{
    /**
     * Process the response.
     */
    protected function setResultsAttribute(): void
    {
        $this->results = Collection::make(
            $this->parsed(),
            $this->hints()
        )->map(function ($value) {
            return Food::create($value);
        });
    }

    /**
     * Extract the "parsed" results.
     *
     * @return array
     */
    protected function parsed(): array
    {
        return Collection::make(Arr::get($this->data, 'parsed'))
            ->first();
    }

    /**
     * Extract the "hints" results.
     *
     * @return array|null
     */
    protected function hints()
    {
        return Collection::make(Arr::get($this->data, 'hints'))
            ->map(function ($value) {
                return Arr::get($value, 'food');
            })
            ->toArray();
    }
}
