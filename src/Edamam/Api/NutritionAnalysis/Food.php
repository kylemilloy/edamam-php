<?php

namespace Edamam\Api\NutritionAnalysis;

use Edamam\Traits\Searchable;
use Edamam\Traits\Instantiable;
use Edamam\Abstracts\NutritionAnalysisRequest;

class Food extends NutritionAnalysisRequest
{
    use Searchable;
    use Instantiable;

    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [
        'ingredient',
        'nutritionType',
    ];

    /**
     * The ingredient.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $ingredient;

    /**
     * When set to nutrition-type=logging it turns on the food logging feature.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $nutritionType;

    /**
     * Get/set the nutrition type.
     *
     * @param string|null $nutritionType
     *
     * @return mixed
     */
    public function nutritionType(?string $nutritionType = null)
    {
        if (1 === func_num_args()) {
            $this->nutritionType = $nutritionType;

            return $this;
        }

        return $this->nutritionType;
    }

    /**
     * Enable food logging.
     *
     * @return self
     */
    public function enableFoodLogging(): self
    {
        return $this->nutritionType('logging');
    }

    /**
     * Disable food logging.
     *
     * @return self
     */
    public function disableFoodLogging(): self
    {
        return $this->nutritionType(null);
    }

    /**
     * Get/set the ingredient attribute.
     *
     * @param string|null $ingredients
     *
     * @return mixed
     */
    public function ingredient(?string $ingredient = null)
    {
        if (1 === func_num_args()) {
            $this->ingredient = $ingredient;

            return $this;
        }

        return $this->ingredient;
    }

    /**
     * Validate the search query.
     *
     * @throws \Exception
     */
    protected function validate()
    {
        if ($this->ingredient()) {
            return;
        }

        throw new \Exception('You must enter an ingredient');
    }

    /**
     * Return the request's method.
     *
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    public function getRequestPath(): string
    {
        return '/api/nutrition-data';
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->filterParameters([
            'ingr' => $this->ingredient(),
            'nutrition-type' => $this->nutritionType(),
        ]);
    }
}
