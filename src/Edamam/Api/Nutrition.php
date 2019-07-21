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
        'img',
        'url',
        'prep',
        'title',
        'force',
        'yield',
        'cuisine',
        'summary',
        'dishtype',
        'mealtype',
        'totalTime',
        'ingredients',
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
        ]);
    }
}
