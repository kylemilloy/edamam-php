<?php

namespace Edamam\Abstracts;

use Edamam\Edamam;

abstract class ApiRequest
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
     * The Edamam application ID.
     *
     * @var string
     */
    public static $appId;

    /**
     * The Edamam application key.
     *
     * @var string
     */
    public static $appKey;

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
     * Return the class' instance.
     *
     * @return self
     */
    abstract public static function instance();

    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getApiCredentials(): array
    {
        return [
            'app_id' => self::$appId,
            'app_key' => self::$appKey,
        ];
    }

    /**
     * Set the App Id and App Key.
     *
     * @param string $appId
     * @param string $appKey
     */
    public static function setApiCredentials(string $appId, string $appKey)
    {
        self::$appId = $appId;
        self::$appKey = $appKey;
    }

    /**
     * Perform the API request.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fetch()
    {
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
        $this->validate();

        return $this->fetch()->getBody();
    }

    /**
     * Validate the search query.
     */
    protected function validate()
    {
    }

    /**
     * Return the request's metho.
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
