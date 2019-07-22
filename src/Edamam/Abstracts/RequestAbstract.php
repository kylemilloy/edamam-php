<?php

namespace Edamam\Abstracts;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

abstract class RequestAbstract
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
     * Customize to perform validation before the results are fetched.
     */
    abstract protected function validate();

    /**
     * Perform the API request.
     *
     * @throws \Exception
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fetch(): Response
    {
        $this->validate();

        return (new Client())
            ->request(
                $this->getRequestMethod(),
                $this->getRequestUrl(),
                $this->getRequestParameters()
            );
    }

    /**
     * Fetch the decoded json.
     *
     * @return mixed
     */
    public function results()
    {
        return json_decode($this->getBody());
    }

    /**
     * Fetch the raw response body.
     *
     * @param mixed $query
     *
     * @return mixed
     */
    public function getBody()
    {
        return $this->fetch()->getBody();
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
     * Return request headers.
     *
     * @return array
     */
    public function getHeaderParameters(): array
    {
        return [
            'Accept-Encoding' => 'gzip',
        ];
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->getApiCredentials();
    }

    /**
     * Get the json body parameters to send on the request.
     *
     * @return array
     */
    public function getBodyParameters(): array
    {
        return [];
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
    public function filterParameters(array $parameters): array
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
            'json' => $this->getBodyParameters(),
            'query' => $this->getQueryParameters(),
            'headers' => $this->getHeaderParameters(),
        ];
    }
}
