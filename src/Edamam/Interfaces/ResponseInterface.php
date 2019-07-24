<?php

namespace Edamam\Interfaces;

use GuzzleHttp\Psr7\Response as HttpResponse;

interface ResponseInterface
{
    /**
     * Instantiate the instance.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(HttpResponse $response);

    /**
     * Return the raw response.
     *
     * @return mixed
     */
    public function raw();

    /**
     * Return the response data.
     *
     * @return mixed
     */
    public function data();

    /**
     * Return the primary results.
     *
     * @return mixed
     */
    public function results();
}
