<?php

namespace Edamam\Api;

use GuzzleHttp\Client;
use Edamam\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    /**
     * The API base URL.
     *
     * @return string
     */
    const BASE_URL = 'https://api.edamam.com';

    /**
     * The name of the response class.
     *
     * @var string
     */
    protected $responseClass = \Edamam\Api\Response::class;

    /**
     * The allowed parameters to mass-assign.
     *
     * @var array
     */
    protected $allowedQueryParameters = [];

    /**
     * The API response instance.
     *
     * @var \Edamam\Api\Response
     */
    protected $response;

    /**
     * Instantiate the class.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->setQueryParameters($parameters);
    }

    /**
     * Instantiate the class.
     *
     * @param array $parameters
     */
    public static function create(array $parameters = [])
    {
        return new static($parameters);
    }

    /**
     * Quickly execute a request to the database.
     *
     * @param array $parameters
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public static function find(array $parameters)
    {
        return self::create($parameters)
            ->fetch()
            ->response();
    }

    /**
     * Customize to perform validation before the results are fetched.
     *
     * @throws \Exception
     */
    public function validate()
    {
    }

    /**
     * Invalidates response cache.
     *
     * @return static
     */
    public function fresh()
    {
        $this->response = null;

        return $this;
    }

    /**
     * Perform the API request.
     *
     * @throws \Exception
     *
     * @return Edamam\Api\Response
     */
    public function fetch(): RequestInterface
    {
        $this->validate();

        $responseClass = $this->responseClass;
        $this->response = new $responseClass((new Client())->request(
            $this->getRequestMethod(),
            $this->getRequestUrl(),
            $this->getRequestParameters()
        ));

        return $this;
    }

    /**
     * Get the raw response.
     *
     * @return \Edamam\Api\Response|null
     */
    public function response(): ?Response
    {
        if (is_null($this->response)) {
            $this->fetch();
        }

        return $this->response;
    }

    /**
     * Return the request's method.
     *
     * @return string
     */
    public function getRequestMethod(): string
    {
        return 'GET';
    }

    /**
     * Return the request URL.
     *
     * @return string
     */
    public function getRequestUrl(): string
    {
        return self::BASE_URL.$this->getRequestPath();
    }

    /**
     * The API URI to request to.
     *
     * @return string
     */
    public function getRequestPath(): string
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
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getAuthenticationParameters(): array
    {
        return [];
    }

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array
    {
        return $this->filterParameters(
            $this->getAuthenticationParameters()
        );
    }

    /**
     * Mass-assign instance parameters.
     *
     * @param array $parameters
     *
     * @return static
     */
    public function setQueryParameters(array $parameters)
    {
        foreach ($parameters as $method => $value) {
            if (in_array($method, $this->allowedQueryParameters)) {
                $this->{$method}($value);
            }
        }

        return $this;
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
     * Filter null values out of array.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function filterParameters(array $parameters): array
    {
        return array_filter($parameters, function ($value) {
            return isset($value);
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
