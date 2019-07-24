<?php

namespace Edamam\Interfaces;

use Edamam\Api\Response;

interface RequestInterface
{
    /**
     * Perform the API request.
     *
     * @throws \Exception
     *
     * @return static
     */
    public function fetch();

    /**
     * Get the raw response.
     *
     * @return \Edamam\Api\Response|null
     */
    public function response(): ?Response;

    /**
     * Customize to perform validation before the results are fetched.
     */
    public function validate();

    /**
     * Invalidates response cache.
     *
     * @return static
     */
    public function fresh();

    /**
     * Return the request's method.
     *
     * @return string
     */
    public function getRequestMethod(): string;

    /**
     * The API URI to request to.
     *
     * @return string
     */
    public function getRequestPath(): string;

    /**
     * Return the request URL.
     *
     * @return string
     */
    public function getRequestUrl(): string;

    /**
     * Return request headers.
     *
     * @return array
     */
    public function getHeaderParameters(): array;

    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getAuthenticationParameters(): array;

    /**
     * Get the APIs search terms.
     *
     * @return array
     */
    public function getQueryParameters(): array;

    /**
     * Mass-assign instance parameters.
     *
     * @param array $parameters
     *
     * @return static
     */
    public function setQueryParameters(array $parameters);

    /**
     * Get the json body parameters to send on the request.
     *
     * @return array
     */
    public function getBodyParameters(): array;

    /**
     * Filter null values out of array.
     *
     * @param array $parameters
     *
     * @return array
     */
    public function filterParameters(array $parameters): array;

    /**
     * Get the request parameters.
     *
     * @return array
     */
    public function getRequestParameters(): array;
}
