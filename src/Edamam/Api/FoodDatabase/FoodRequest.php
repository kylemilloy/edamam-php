<?php

namespace Edamam\Api\FoodDatabase;

class FoodRequest extends FoodDatabaseRequest
{
    /**
     * The name of the response class.
     *
     * @var string
     */
    protected $responseClass = \Edamam\Api\FoodDatabase\FoodResponse::class;

    /**
     * The allowed parameters to assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [
        'upc',
        'page',
        'calories',
        'category',
        'ingredient',
        'healthLabel',
        'categoryLabel',
        'nutritionType',
        'maximumCalories',
        'minimumCalories',
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
     * The page value to search.
     *
     * @var int
     */
    protected $page;

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
     * Set the ingredient to search.
     *
     * @param mixed $ingredient
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function ingredient($ingredient = null)
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
     * Get/set the UPC to search.
     *
     * @param mixed $upc
     *
     * @return mixed
     */
    public function upc($upc = null)
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
     * Get/set the pagination value.
     *
     * @param mixed $page
     *
     * @return mixed
     */
    public function page($page = null)
    {
        if (1 === func_num_args()) {
            $this->page = $page;

            return $this;
        }

        return $this->page;
    }

    /**
     * Get/set the nutrition type.
     *
     * @param mixed $nutritionType
     *
     * @return mixed
     */
    public function nutritionType($nutritionType = null)
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
     * @return static
     */
    public function enableFoodLogging()
    {
        return $this->nutritionType('logging');
    }

    /**
     * Disable food logging.
     *
     * @return static
     */
    public function disableFoodLogging()
    {
        return $this->nutritionType(null);
    }

    /**
     * Get/set the specified health label.
     *
     * @param mixed $healthLabel
     *
     * @return mixed
     */
    public function healthLabel($healthLabel = null)
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
            extract($minimum);
        }

        $this->minimumCalories($minimum);
        $this->maximumCalories($maximum);

        return $this;
    }

    /**
     * Get/set the minimum calories, if 0 remove limit.
     *
     * @param mixed $minimum
     *
     * @return self
     */
    public function minimumCalories($minimum = null)
    {
        if (1 === func_num_args()) {
            $this->minimumCalories = abs($minimum) ?: null;

            return $this;
        }

        return $this->minimumCalories;
    }

    /**
     * Get/set the maximum calories, if 0 remove limit.
     *
     * @param mixed $maximum
     *
     * @return mixed
     */
    public function maximumCalories($maximum = null)
    {
        if (1 === func_num_args()) {
            $this->maximumCalories = abs($maximum) ?: null;

            return $this;
        }

        return $this->maximumCalories;
    }

    /**
     * Set the instance calories via array.
     *
     * @param array $calories
     *
     * @return static
     */
    protected function setCaloriesByArray(array $calories)
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
     * @param mixed $category
     *
     * @return mixed
     */
    public function category($category = null)
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
     * @param mixed $categoryLabel
     *
     * @return mixed
     */
    public function categoryLabel($categoryLabel = null)
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
    public function validate()
    {
        if ($this->ingredient() || $this->upc()) {
            return;
        }

        throw new \Exception('You must enter either an ingredient or UPC code to search for');
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    public function getRequestPath(): string
    {
        return '/api/food-database/parser';
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->filterParameters(array_merge([
            'upc' => $this->upc(),
            'page' => $this->page(),
            'ingr' => $this->ingredient(),
            'calories' => $this->calories(),
            'category' => $this->category(),
            'health' => $this->healthLabel(),
            'categoryLabel' => $this->categoryLabel(),
            'nutrition-type' => $this->nutritionType(),
        ], $this->getAuthenticationParameters()));
    }
}
