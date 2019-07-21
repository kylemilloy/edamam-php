<?php

namespace Edamam\Api\NutritionAnalysis;

use Edamam\Interfaces\InstantiatorInterface;

class Recipe extends NutritionAnalysisRequestor implements InstantiatorInterface
{
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
     * Return the Recipe instance.
     *
     * @return self
     */
    public static function instance(): InstantiatorInterface
    {
        return new self();
    }

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
        if (!$this->ingredient()) {
            throw new \Exception('You must enter an ingredient');
        }
    }

    /**
     * Return the request's method.
     *
     * @return string
     */
    protected function getRequestMethod()
    {
        return 'GET';
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    protected function getRequestPath()
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
        return $this->filterQueryParameters([
            'ingr' => $this->ingredient(),
            'nutrition-type' => $this->nutritionType(),
        ]);
    }
}
