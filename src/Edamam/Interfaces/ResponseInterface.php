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
     * Return the primary results.
     *
     * @return mixed
     */
    public function results();
}
