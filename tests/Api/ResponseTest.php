<?php

namespace Tests\Api;

use Tests\TestCase;
use ReflectionClass;
use Edamam\Api\Response;
use Tightenco\Collect\Support\Collection;
use GuzzleHttp\Psr7\Response as HttpResponse;

class ResponseTest extends TestCase
{
    /**
     * Name of class to mock.
     *
     * @var string
     */
    protected $stubClass = Response::class;

    /**
     * Fake data for mockery to return.
     *
     * @var array
     */
    protected $fakeData = [];

    /** @test */
    public function it_returns_a_raw_response()
    {
        $response = $this->createResponse();

        $this->assertInstanceOf(HttpResponse::class, $response->raw());
    }

    /** @test */
    public function it_returns_a_data_array()
    {
        $response = $this->createResponse();

        $this->assertIsArray($response->data());
    }

    /** @test */
    public function it_returns_a_results_collection()
    {
        $response = $this->createResponse();

        $this->assertInstanceOf(Collection::class, $response->results());
    }

    /**
     * Create the mockery class.
     *
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function createResponse()
    {
        $stub = $this->getMockBuilder($this->stubClass)
            ->disableOriginalConstructor()
            ->getMock();

        $stub->method('raw')
            ->willReturn(new HttpResponse());

        $stub->method('data')
            ->willReturn($this->fakeData);

        $stub->method('results')
            ->willReturn(new Collection());

        $this->setProtectedProperty($stub, 'data', $this->fakeData);

        return $stub;
    }

    /**
     * Sets a protected property on a given object via reflection.
     *
     * @param $object - instance in which protected value is being modified
     * @param $property - property on instance being modified
     * @param $value - new value of the property being modified
     */
    public function setProtectedProperty($object, $property, $value)
    {
        $reflection = new ReflectionClass($object);

        $reflection_property = $reflection->getProperty($property);
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($object, $value);
    }
}
