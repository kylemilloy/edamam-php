<?php

namespace Edamam\Abstracts;

use Edamam\Edamam;

abstract class RequestorAbstract
{
    /**
     * The API base URL.
     *
     * @return string
     */
    const BASE_URL = 'https://api.edamam.com';

    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [];

    /**
     * Return the API Credentials.
     *
     * @return array
     */
    abstract public static function getApiCredentials(): array;

    /**
     * Perform the API request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fetch()
    {
        $this->validate();

        return (new \GuzzleHttp\Client())
            ->request(
                $this->getRequestMethod(),
                $this->getRequestUrl(),
                $this->getRequestParameters()
            );
    }

    /**
     * Send the API request.
     *
     * @param mixed $query
     *
     * @throws \Exception
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    public function results()
    {
        return json_decode($this->fetch()->getBody());
    }

    /**
     * Validate the search query.
     */
    protected function validate()
    {
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
     * Return the request URL.
     *
     * @return string
     */
    protected function getRequestUrl()
    {
        return self::BASE_URL.$this->getRequestPath();
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    protected function getRequestPath()
    {
        return '';
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        $parameters = [];

        foreach ($this->allowedQueryParameters as $parameter) {
            if (method_exists($this, $parameter)) {
                $parameters[$parameter] = $this->{$parameter}();
            }
        }

        return $this->filterQueryParameters($parameters);
    }

    /**
     * Mass-assign instance parameters.
     *
     * @param array $parameters
     *
     * @return self
     */
    public function setQueryParameters(array $parameters = null): self
    {
        if (is_string($parameters)) {
            $this->ingredient($parameters);
        }

        if (is_array($parameters)) {
            foreach ($parameters as $method => $value) {
                if (in_array($method, $this->allowedQueryParameters)) {
                    $this->{$method}($value);
                }
            }
        }

        return $this;
    }

    /**
     * Filter null values out of array.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function filterQueryParameters(array $parameters): array
    {
        return array_filter($parameters, function ($value) {
            return null !== $value;
        });
    }

    /**
     * Get the request parameters.
     *
     * @return array
     */
    public function getRequestParameters(): array
    {
        return [
            'Accept-Encoding' => 'gzip',
            'query' => array_merge(
                $this->getApiCredentials(),
                $this->getQueryParameters()
            ),
        ];
    }
}
