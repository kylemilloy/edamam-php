<?php

namespace Edamam\Api;

use Edamam\Abstracts\ApiRequest;

class Nutrition extends ApiRequest
{
    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [
        'url',
        'force',
        'image',
        'title',
        'yield',
        'cuisine',
        'summary',
        'dishType',
        'mealType',
        'totalTime',
        'ingredients',
        'instructions',
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
     * Url of the recipe’s location.
     *
     * @var bool
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $force;

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $image;

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $title;

    /**
     * Url of the recipe’s location.
     *
     * @var int
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $yield;

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $cuisine;

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $summary;

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $dishType;

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $mealType;

    /**
     * Url of the recipe’s location.
     *
     * @var int
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $totalTime;

    /**
     * Url of the recipe’s location.
     *
     * @var array
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $ingredients;

    /**
     * Url of the recipe’s location.
     *
     * @var string
     *
     * @see https://developer.edamam.com/edamam-docs-nutrition-api
     */
    protected $instructions;

    /**
     * Instantiate the object.
     *
     * @param string|null $appId
     * @param string|null $appKey
     */
    public function __construct(?string $appId = null, ?string $appKey = null)
    {
        if (2 === func_num_args()) {
            self::setApiCredentials($appId, $appKey);
        }
    }

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
     * Get/set the force attribute.
     *
     * @param bool|null $force
     *
     * @return mixed
     */
    public function force(?bool $force = null)
    {
        if (1 === func_num_args()) {
            $this->force = $force;

            return $this;
        }

        return $this->force;
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
     * Syntactic sugar for the 'image' method.
     *
     * @param string|null $image
     *
     * @return mixed
     */
    public function img(?string $image = null)
    {
        return $this->image($image);
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
     * Get/set the totalTime attribute.
     *
     * @param string|null $totalTime
     *
     * @return mixed
     */
    public function totalTime(?int $totalTime = null)
    {
        if (1 === func_num_args()) {
            $this->totalTime = $totalTime;

            return $this;
        }

        return $this->totalTime;
    }

    /**
     * Syntactic sugar for the 'totalTime' method.
     *
     * @param string|null $totalTime
     *
     * @return mixed
     */
    public function ttime(?int $totalTime = null)
    {
        return $this->totalTime($totalTime);
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
     * Syntactic sugar for the ingredients attribute.
     *
     * @param mixed $ingredients
     *
     * @return mixed
     */
    public function ingr($ingredients = null)
    {
        return $this->ingredients($ingredients);
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
     * Syntactic sugar for the 'instructions' method.
     *
     * @param string|null $instructions
     *
     * @return mixed
     */
    public function prep(?string $instructions = null)
    {
        return $this->instructions($instructions);
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
     * Return the request's metho.
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
        return 'nutrition-details';
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
            'ttime' => $this->totalTime(),
            'ingr' => $this->ingredients(),
            'dishtype' => $this->dishType(),
            'mealtype' => $this->mealType(),
            'prep' => $this->preperationInstructions(),
        ]);
    }
}
