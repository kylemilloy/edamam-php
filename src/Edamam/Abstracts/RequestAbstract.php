<?php

namespace Edamam\Abstracts;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Edamam\Interfaces\RequestInterface;

abstract class RequestAbstract implements RequestInterface
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
     * The API response instance.
     *
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;

    public function __construct(array $parameters = [])
    {
        $this->setQueryParameters($parameters);
    }

    /**
     * Customize to perform validation before the results are fetched.
     */
    abstract protected function validate();

    /**
     * Invalidates response cache.
     *
     * @return self
     */
    public function fresh(): RequestInterface
    {
        $this->response = null;

        return $this;
    }

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

        return $this->response() ?:
            $this->response = (new Client())->request(
                $this->getRequestMethod(),
                $this->getRequestUrl(),
                $this->getRequestParameters()
            );
    }

    /**
     * Get the raw response.
     *
     * @return \GuzzleHttp\Psr7\Response|null
     */
    public function response(): ?Response
    {
        return $this->response;
    }

    /**
     * Fetch the decoded json.
     *
     * @return mixed
     */
    public function results()
    {
        return json_decode($this->fetch()->getBody());
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
    abstract public static function getApiCredentials(): array;

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
     * Mass-assign instance parameters.
     *
     * @param array $parameters
     *
     * @return self
     */
    public function setQueryParameters(array $parameters): RequestInterface
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
