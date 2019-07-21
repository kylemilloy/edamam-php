<?php

namespace Edamam\Api;

use Edamam\Edamam;
use Edamam\Abstracts\ApiRequest;

class Food extends ApiRequest
{
    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [
        'ingredient',
        'upc',
        'nutritionType',
        'healthLabel',
        'calories',
        'minimumCalories',
        'maximumCalories',
        'category',
        'categoryLabel',
    ];

    /**
     * The ingredient to search.
     *
     * @var string
     */
    protected $ingredient;

    /**
     * The UPC value to search.
     *
     * @var string
     */
    protected $upc;

    /**
     * When set to true, turn on the food logging feature.
     *
     * @var string
     *
     * @see https://developer.edamam.com/food-database-api-docs
     */
    protected $nutritionType;

    /**
     * One of the Health api parameters listed in Diet and Health
     * Labels table at the end of this documentation.
     *
     * @var string
     *
     * @see https://developer.edamam.com/food-database-api-docs
     */
    protected $healthLabel;

    /**
     * The minimum amount of calories (in kcal).
     *
     * @var int
     *
     * @see https://developer.edamam.com/food-database-api-docs
     */
    protected $minimumCalories;

    /**
     * The maximum amount of calories (in kcal).
     *
     * @var int
     *
     * @see https://developer.edamam.com/food-database-api-docs
     */
    protected $maximumCalories;

    /**
     * Category as- generic-foods, generic-meals, packaged-foods, fast-foods.
     *
     * @var string
     *
     * @see https://developer.edamam.com/food-database-api-docs
     */
    protected $category;

    /**
     * Item type as – food or meal. Food is usually basic component of meal.
     *
     * @var string
     *
     * @see https://developer.edamam.com/food-database-api-docs
     */
    protected $categoryLabel;

    /**
     * Instantiate the object.
     *
     * @param string|null $appId
     * @param string|null $appKey
     */
    public function __construct(?string $appId = null, ?string $appKey = null)
    {
        if (2 === func_num_args()) {
            Edamam::setApiCredentials($appId, $appKey);
        }
    }

    /**
     * Return the Food instance.
     *
     * @return \Edamam\Food
     */
    public static function instance(): self
    {
        return new self();
    }

    /**
     * Set the ingredient to search.
     *
     * @param string|null $ingredient
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function ingredient(?string $ingredient = null)
    {
        if (1 === func_num_args()) {
            if ($this->upc()) {
                throw new \Exception('Only an ingredient or UPC may be set, not both');
            }

            $this->ingredient = $ingredient;

            return $this;
        }

        return $this->ingredient;
    }

    /**
     * Syntactic sugar for 'ingredient' method to match Edamam's API.
     *
     * @param string|null $ingredient
     *
     * @return mixed
     */
    public function ingr(?string $ingredient = null)
    {
        return $this->ingredient($ingredient);
    }

    /**
     * Set the UPC to search.
     *
     * @param string|null $upc
     *
     * @return mixed
     */
    public function upc(?string $upc = null)
    {
        if (1 === func_num_args()) {
            if ($this->ingredient()) {
                throw new \Exception('Only an ingredient or UPC may be set, not both');
            }

            $this->upc = $upc;

            return $this;
        }

        return $this->upc;
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
     * Get/set the specified health label.
     *
     * @param string $healthLabel
     *
     * @return mixed
     */
    public function healthLabel(?string $healthLabel = null)
    {
        if (1 === func_num_args()) {
            $this->healthLabel = $healthLabel;

            return $this;
        }

        return $this->healthLabel;
    }

    /**
     * Get/set the specified calorie range.
     *
     * @param mixed $minimum
     * @param mixed $maximum
     *
     * @return mixed
     */
    public function calories($minimum = null, $maximum = null)
    {
        if (0 === func_num_args()) {
            return $this->getCaloriesRange();
        }

        if (is_array($minimum)) {
            return $this->setCaloriesByArray($minimum);
        }

        $this->minimumCalories($minimum);
        $this->maximumCalories($maximum);

        return $this;
    }

    /**
     * Set the minimum calories.
     *
     * @param mixed $minimum
     *
     * @return self
     */
    public function minimumCalories($minimum = null)
    {
        if (1 === func_num_args()) {
            $this->minimumCalories = abs($minimum);

            return $this;
        }

        return $this->minimumCalories;
    }

    /**
     * Get/set the maximum calories.
     *
     * @param mixed $maximum
     *
     * @return mixed
     */
    public function maximumCalories($maximum = null)
    {
        if (1 === func_num_args()) {
            $this->maximumCalories = abs($maximum);

            return $this;
        }

        return $this->maximumCalories;
    }

    /**
     * Set the instance calories via array.
     *
     * @param array $calories
     *
     * @return self
     */
    protected function setCaloriesByArray(array $calories): self
    {
        if (isset($calories['minimum']) || isset($calories[0])) {
            $this->minimumCalories($calories['minimum'] ?? $calories[0]);
        }

        if (isset($calories['maximum']) || isset($calories[1])) {
            $this->maximumCalories($calories['maximum'] ?? $calories[1]);
        }

        return $this;
    }

    /**
     * Return the parsed calorie range.
     *
     * @return string|null
     */
    protected function getCaloriesRange()
    {
        if ($this->minimumCalories() && !$this->maximumCalories()) {
            return $this->minimumCalories().'+';
        }

        if (!$this->minimumCalories() && $this->maximumCalories()) {
            return $this->maximumCalories();
        }

        if ($this->minimumCalories() && $this->maximumCalories()) {
            return $this->minimumCalories().'-'.$this->maximumCalories();
        }
    }

    /**
     * Get/set the API category.
     *
     * @param string $category
     *
     * @return mixed
     */
    public function category(?string $category = null)
    {
        if (1 === func_num_args()) {
            $this->category = $category;

            return $this;
        }

        return $this->category;
    }

    /**
     * Set the category label.
     *
     * @param string $categoryLabel
     *
     * @return mixed
     */
    public function categoryLabel(?string $categoryLabel = null)
    {
        if (1 === func_num_args()) {
            $this->categoryLabel = $categoryLabel;

            return $this;
        }

        return $this->categoryLabel;
    }

    /**
     * Validate the search query.
     *
     * @throws \Exception
     */
    protected function validate()
    {
        if (!$this->ingredient() && !$this->upc()) {
            throw new \Exception('You must enter either an ingredient or UPC code to search for');
        }
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    protected function getRequestPath()
    {
        return '/food-database/parser';
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
            'upc' => $this->upc(),
            'nutrition-type' => $this->nutritionType(),
            'health' => $this->healthLabel(),
            'calories' => $this->calories(),
            'category' => $this->category(),
            'categoryLabel' => $this->categoryLabel(),
        ]);
    }
}
