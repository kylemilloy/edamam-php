<?php

namespace Edamam\Interfaces;

use GuzzleHttp\Psr7\Response;

interface RequestInterface
{
    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getApiCredentials(): array;

    /**
     * Invalidates response cache.
     *
     * @return self
     */
    public function fresh(): RequestInterface;

    /**
     * Perform the API request.
     *
     * @throws \Exception
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function fetch(): Response;

    /**
     * Get the raw response.
     *
     * @return \GuzzleHttp\Psr7\Response|null
     */
    public function response(): ?Response;

    /**
     * Fetch the decoded json.
     *
     * @return mixed
     */
    public function results();

    /**
     * Return the request's method.
     *
     * @return string
     */
    public function getRequestMethod(): string;

    /**
     * Return the request URL.
     *
     * @return string
     */
    public function getRequestUrl(): string;

    /**
     * The API URI to request to.
     *
     * @return string
     */
    public function getRequestPath(): string;

    /**
     * Return request headers.
     *
     * @return array
     */
    public function getHeaderParameters(): array;

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
     * @return self
     */
    public function setQueryParameters(array $parameters): RequestInterface;

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
