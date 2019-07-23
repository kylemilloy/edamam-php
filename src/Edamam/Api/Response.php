<?php

namespace Edamam\Api;

use Edamam\Interfaces\ResponseInterface;
use GuzzleHttp\Psr7\Response as HttpResponse;

class Response implements ResponseInterface
{
    /**
     * The raw response.
     *
     * @var \GuzzleHttp\Psr7\Response
     */
    public $raw;

    /**
     * The encoded response.
     *
     * @var array
     */
    public $data;

    /**
     * Instantiate the instance.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(HttpResponse $response)
    {
        $this->raw = $response;
        $this->data = json_decode((string) $this->raw->getBody(), true);

        $this->process();
    }

    /**
     * Process the response.
     */
    protected function process(): void
    {
    }

    /**
     * Return the primary results.
     *
     * @return array
     */
    public function results()
    {
        return $this->data;
    }
}
