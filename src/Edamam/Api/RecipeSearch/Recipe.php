<?php

namespace Edamam\Api\RecipeSearch;

use Edamam\Abstracts\ApiRequest;

class Recipe extends ApiRequest
{
    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [
        'to',
        'diet',
        'from',
        'time',
        'query',
        'recipe',
        'calories',
        'dishType',
        'cuisineType',
        'healthLabel',
        'excludedIngredients',
        'numberOfIngredients',
    ];

    /**
     * Return the Food instance.
     *
     * @return self
     */
    public static function instance(): self
    {
        return new self();
    }

    /**
     * Get/set the to attribute.
     *
     * @param int|null $to
     *
     * @return mixed
     */
    public function to(?int $to = null)
    {
        if (1 === func_num_args()) {
            $this->to = $to;

            return $this;
        }

        return $this->to;
    }

    /**
     * Get/set the diet attribute.
     *
     * @param string|null $diet
     *
     * @return mixed
     */
    public function diet(?string $diet = null)
    {
        if (1 === func_num_args()) {
            $this->diet = $diet;

            return $this;
        }

        return $this->diet;
    }

    /**
     * Get/set the from attribute.
     *
     * @param int|null $from
     *
     * @return mixed
     */
    public function from(?int $from = null)
    {
        if (1 === func_num_args()) {
            $this->from = $from;

            return $this;
        }

        return $this->from;
    }

    /**
     * Get/set the specified calorie range.
     *
     * @param mixed $minimum
     * @param mixed $maximum
     *
     * @return mixed
     */
    public function time($minimum = null, $maximum = null)
    {
        if (0 === func_num_args()) {
            return $this->getTimeRange();
        }

        if (is_array($minimum)) {
            return $this->setTimeByArray($minimum);
        }

        $this->minimumTime($minimum);
        $this->maximumTime($maximum);

        return $this;
    }

    /**
     * Set the minimum time.
     *
     * @param mixed $time
     *
     * @return self
     */
    public function minimumTime($minimum = null)
    {
        if (1 === func_num_args()) {
            $this->minimumTime = abs($minimum);

            return $this;
        }

        return $this->minimumTime;
    }

    /**
     * Get/set the maximum time.
     *
     * @param mixed $maximum
     *
     * @return mixed
     */
    public function maximumTime($maximum = null)
    {
        if (1 === func_num_args()) {
            $this->maximumTime = abs($maximum);

            return $this;
        }

        return $this->maximumTime;
    }

    /**
     * Set the instance time via array.
     *
     * @param array $time
     *
     * @return self
     */
    protected function setTimeByArray(array $time): self
    {
        if (isset($time['minimum']) || isset($time[0])) {
            $this->minimumCalories($time['minimum'] ?? $time[0]);
        }

        if (isset($time['maximum']) || isset($time[1])) {
            $this->maximumCalories($time['maximum'] ?? $time[1]);
        }

        return $this;
    }

    /**
     * Return the parsed time range.
     *
     * @return string|null
     */
    protected function getTimeRange()
    {
        if ($this->minimumTime() && !$this->maximumTime()) {
            return $this->minimumTime().'+';
        }

        if (!$this->minimumTime() && $this->maximumTime()) {
            return $this->maximumTime();
        }

        if ($this->minimumTime() && $this->maximumTime()) {
            return $this->minimumTime().'-'.$this->maximumTime();
        }
    }

    /**
     * Get/set the query attribute.
     *
     * @param string|null $query
     *
     * @return mixed
     */
    public function query(?string $query = null)
    {
        if (1 === func_num_args()) {
            $this->query = $query;

            return $this;
        }

        return $this->query;
    }

    /**
     * Syntactic sugar for the 'query' method.
     *
     * @param string|null $query
     *
     * @return mixed
     */
    public function q(?string $query = null)
    {
        return $this->query($query);
    }

    /**
     * Get/set the recipe attribute.
     *
     * @param string|null $recipe
     *
     * @return mixed
     */
    public function recipe(?string $recipe = null)
    {
        if (1 === func_num_args()) {
            $this->recipe = $recipe;

            return $this;
        }

        return $this->recipe;
    }

    /**
     * Syntactic sugar for the 'recipe' method.
     *
     * @param string|null $recipe
     *
     * @return mixed
     */
    public function r(?string $recipe = null)
    {
        if (1 === func_num_args()) {
            $this->recipe = $recipe;

            return $this;
        }

        return $this->recipe;
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
     * Get/set the dishType attribute.
     *
     * @param mixed $dishType
     *
     * @return mixed
     */
    public function dishType($dishType = null)
    {
        if (1 === func_num_args()) {
            if (is_string($dishType)) {
                $dishType = [$dishType];
            }

            $this->dishType = $dishType;

            return $this;
        }

        return $this->dishType;
    }

    /**
     * Get/set the cuisineType attribute.
     *
     * @param array|null $cuisineType
     *
     * @return mixed
     */
    public function cuisineType(?array $cuisineType = null)
    {
        if (1 === func_num_args()) {
            if (is_string($cuisineType)) {
                $cuisineType = [$cuisineType];
            }

            $this->cuisineType = $cuisineType;

            return $this;
        }

        return $this->cuisineType;
    }

    /**
     * Get/set the healthLabel attribute.
     *
     * @param string|null $healthLabel
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
     * Syntactic sugar for the 'healthLabel' method.
     *
     * @param string|null $healthLabel
     *
     * @return mixed
     */
    public function health(?string $healthLabel = null)
    {
        return $this->healthLabel($healthLabel);
    }

    /**
     * Get/set the excludedIngredients attribute.
     *
     * @param mixed $excludedIngredients
     *
     * @return mixed
     */
    public function excludedIngredients($excludedIngredients = null)
    {
        if (1 === func_num_args()) {
            if (is_string($excludedIngredients)) {
                $excludedIngredients = [$excludedIngredients];
            }

            $this->excludedIngredients = $excludedIngredients;

            return $this;
        }

        return $this->excludedIngredients;
    }

    /**
     * Syntactic sugar for the 'excludedIngredients' method.
     *
     * @param mixed $excludedIngredients
     *
     * @return mixed
     */
    public function excluded($excludedIngredients = null)
    {
        return $this->excludedIngredients($excludedIngredients);
    }

    /**
     * Get/set the numberOfIngredients attribute.
     *
     * @param int|null $numberOfIngredients
     *
     * @return mixed
     */
    public function numberOfIngredients(?int $numberOfIngredients = null)
    {
        if (1 === func_num_args()) {
            $this->numberOfIngredients = $numberOfIngredients;

            return $this;
        }

        return $this->numberOfIngredients;
    }

    /**
     * Syntactic sugar for the 'numberOfIngredients' method.
     *
     * @param int|null $numberOfIngredients
     *
     * @return mixed
     */
    public function ingredients(?int $numberOfIngredients = null)
    {
        return $this->numberOfIngredients($numberOfIngredients);
    }

    /**
     * Syntactic sugar for the 'numberOfIngredients' method.
     *
     * @param int|null $numberOfIngredients
     *
     * @return mixed
     */
    public function ingr(?int $numberOfIngredients = null)
    {
        return $this->numberOfIngredients($numberOfIngredients);
    }

    /**
     * Validate the search query.
     *
     * @throws \Exception
     */
    protected function validate()
    {
        if (!$this->query() || !$this->recipe()) {
            throw new \Exception('You must enter a query or a recipe title');
        }
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    protected function getRequestPath()
    {
        return '/search';
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->filterQueryParameters([
            'to' => $this->to(),
            'r' => $this->name(),
            'q' => $this->query(),
            'diet' => $this->diet(),
            'from' => $this->from(),
            'time' => $this->time(),
            'calories' => $this->calories(),
            'dishType' => $this->dishType(),
            'health' => $this->healthLabel(),
            'cuisineType' => $this->cuisineType(),
            'ingr' => $this->numberOfIngredients(),
            'excludedIngredients' => $this->excludedIngredients(),
        ]);
    }
}
