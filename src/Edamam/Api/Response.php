<?php

namespace Edamam\Api;

use Edamam\Interfaces\ResponseInterface;
use Tightenco\Collect\Support\Collection;
use GuzzleHttp\Psr7\Response as HttpResponse;

class Response implements ResponseInterface
{
    /**
     * The raw response.
     *
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $raw;

    /**
     * The encoded response.
     *
     * @var mixed
     */
    protected $data;

    /**
     * The result collection.
     *
     * @var mixed
     */
    protected $results;

    /**
     * Instantiate the instance.
     *
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function __construct(HttpResponse $response)
    {
        $this->raw = $response;
        $this->data = json_decode((string) $this->raw->getBody(), true);

        $this->setResultsAttribute();
    }

    /**
     * Process the response.
     */
    protected function setResultsAttribute(): void
    {
        $this->results = Collection::make($this->data);
    }

    /**
     * Return the raw response.
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function raw(): HttpResponse
    {
        return $this->raw;
    }

    /**
     * Return the primary results.
     *
     * @return array
     */
    public function data(): array
    {
        return $this->data;
    }

    /**
     * The results collection.
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function results(): Collection
    {
        return $this->results;
    }
}
