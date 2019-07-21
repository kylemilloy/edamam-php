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
        'url',
        'image',
        'title',
        'yield',
        'cuisine',
        'summary',
        'dishType',
        'mealType',
        'ingredients',
        'instructions',
        'forceReevaluation',
        'totalPreperationTime',
    ];

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $url;

    /**
     * Forces the re-evaluation of the recipe. The value, if any, is ignored.
     *
     * @var bool
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $forceReevaluation;

    /**
     * Image link (absolute).
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $image;

    /**
     * Common name of the recipe.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $title;

    /**
     * Number of servings.
     *
     * @var int
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $yield;

    /**
     * Type of cuisine.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $cuisine;

    /**
     * A short description of the recipe.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $summary;

    /**
     * Type of dish.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $dishType;

    /**
     * Type of meal.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $mealType;

    /**
     * Total time for preparation.
     *
     * @var int
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $totalPreperationTime;

    /**
     * Ingredients (array of strings).
     *
     * @var array
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $ingredients = [];

    /**
     * Preparation instructions (free text).
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $instructions;

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
     * Get/set the url attribute.
     *
     * @param string|null $url
     *
     * @return mixed
     */
    public function url(?string $url = null)
    {
        if (1 === func_num_args()) {
            $this->url = $url;

            return $this;
        }

        return $this->url;
    }

    /**
     * Get/set the forceReevaluation attribute.
     *
     * @param bool|null $forceReevaluation
     *
     * @return mixed
     */
    public function forceReevaluation(?bool $forceReevaluation = null)
    {
        if (1 === func_num_args()) {
            $this->forceReevaluation = $forceReevaluation;

            return $this;
        }

        return $this->forceReevaluation;
    }

    /**
     * Force API to re-evaluate recipe.
     *
     * @return mixed
     */
    public function enableRecipeReevaluation()
    {
        return $this->forceReevaluation(true);
    }

    /**
     * Prevent API from re-evaluating recipe.
     *
     * @return mixed
     */
    public function disableRecipeReevaluation()
    {
        return $this->forceReevaluation(null);
    }

    /**
     * Get/set the image attribute.
     *
     * @param string|null $image
     *
     * @return mixed
     */
    public function image(?string $image = null)
    {
        if (1 === func_num_args()) {
            $this->image = $image;

            return $this;
        }

        return $this->image;
    }

    /**
     * Get/set the title attribute.
     *
     * @param string|null $title
     *
     * @return mixed
     */
    public function title(?string $title = null)
    {
        if (1 === func_num_args()) {
            $this->title = $title;

            return $this;
        }

        return $this->title;
    }

    /**
     * Get/set the yield size attribute.
     *
     * @param int|null $yield
     *
     * @return mixed
     */
    public function yield(?int $yield = null)
    {
        if (1 === func_num_args()) {
            $this->yield = abs($yield);

            return $this;
        }

        return $this->yield;
    }

    /**
     * Get/set the cuisine attribute.
     *
     * @param string|null $cuisine
     *
     * @return mixed
     */
    public function cuisine(?string $cuisine = null)
    {
        if (1 === func_num_args()) {
            $this->cuisine = $cuisine;

            return $this;
        }

        return $this->cuisine;
    }

    /**
     * Get/set the summary attribute.
     *
     * @param string|null $summary
     *
     * @return mixed
     */
    public function summary(?string $summary = null)
    {
        if (1 === func_num_args()) {
            $this->summary = $summary;

            return $this;
        }

        return $this->summary;
    }

    /**
     * Get/set the dish type attribute.
     *
     * @param string|null $dishType
     *
     * @return mixed
     */
    public function dishType(?string $dishType = null)
    {
        if (1 === func_num_args()) {
            $this->dishType = $dishType;

            return $this;
        }

        return $this->dishType;
    }

    /**
     * Get/set the mealType attribute.
     *
     * @param string|null $mealType
     *
     * @return mixed
     */
    public function mealType(?string $mealType = null)
    {
        if (1 === func_num_args()) {
            $this->mealType = $mealType;

            return $this;
        }

        return $this->mealType;
    }

    /**
     * Get/set the totalPreperationTime attribute.
     *
     * @param string|null $totalPreperationTime
     *
     * @return mixed
     */
    public function totalPreperationTime(?int $totalPreperationTime = null)
    {
        if (1 === func_num_args()) {
            $this->totalPreperationTime = $totalPreperationTime;

            return $this;
        }

        return $this->totalPreperationTime;
    }

    /**
     * Get/set the ingredients attribute.
     *
     * @param mixed $ingredients
     *
     * @return mixed
     */
    public function ingredients($ingredients = null)
    {
        if (1 === func_num_args()) {
            if (is_string($ingredients)) {
                $ingredients = [$ingredients];
            }

            $this->ingredients = $ingredients;

            return $this;
        }

        return $this->ingredients;
    }

    /**
     * Get/set the instructions attribute.
     *
     * @param string|null $instructions
     *
     * @return mixed
     */
    public function instructions(?string $instructions = null)
    {
        if (1 === func_num_args()) {
            $this->instructions = $instructions;

            return $this;
        }

        return $this->instructions;
    }

    /**
     * Validate the search query.
     *
     * @throws \Exception
     */
    protected function validate()
    {
        if (!$this->ingredients() || !$this->title()) {
            throw new \Exception('You must enter a list of ingredients and a title');
        }
    }

    /**
     * Return the request's method.
     *
     * @return string
     */
    protected function getRequestMethod()
    {
        return 'POST';
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    protected function getRequestPath()
    {
        return '/api/nutrition-details';
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->filterQueryParameters([
            'url' => $this->url(),
            'img' => $this->image(),
            'title' => $this->title(),
            'yield' => $this->yield(),
            'cuisine' => $this->cuisine(),
            'summary' => $this->summary(),
            'ingr' => $this->ingredients(),
            'dishtype' => $this->dishType(),
            'prep' => $this->instructions(),
            'mealtype' => $this->mealType(),
            'force' => $this->forceReevaluation(),
            'ttime' => $this->totalPreperationTime(),
        ]);
    }
}
