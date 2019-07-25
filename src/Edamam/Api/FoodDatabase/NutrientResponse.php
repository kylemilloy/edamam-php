<?php

namespace Edamam\Api\FoodDatabase;

use Edamam\Api\Response;
use Edamam\Support\Nutrient;
use Tightenco\Collect\Support\Collection;

class NutrientResponse extends Response
{
    /**
     * Process the response.
     */
    protected function setResultsAttribute(): void
    {
        $this->results = Collection::make(
            $this->data
        )->mapInto(Nutrient::class);
        echo json_encode($this->data);
    }
}
