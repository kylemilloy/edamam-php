<?php

namespace Edamam\Api;

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
        return 'search';
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
