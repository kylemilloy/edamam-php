<?php

namespace Tests\Api\FoodDatabase;

use Tests\TestCase;
use Edamam\Support\Measurement;
use Edamam\Api\FoodDatabase\NutrientRequest;
use Edamam\Api\FoodDatabase\FoodDatabase;

class NutrientRequestTest extends TestCase
{
    /**
     * The FoodRequest instance.
     *
     * @var \Edamam\Api\FoodDatabase\NutrientRequest
     */
    protected $nutrients;

    public function setUp()
    {
        parent::setUp();

        FoodDatabase::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));

        $this->requests = NutrientRequest::instance();
    }

    /** @test */
    public function the_nutrients_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(NutrientRequest::class, new NutrientRequest());
        $this->assertInstanceOf(NutrientRequest::class, NutrientRequest::instance());
    }

    /** @test */
    public function it_can_get_set_a_yield()
    {
        $this->assertNull($this->requests->yield());

        $this->assertInstanceOf(NutrientRequest::class, $this->requests->yield($value = 1));

        $this->assertEquals($value, $this->requests->yield());
    }

    /** @test */
    public function it_can_get_set_a_id()
    {
        $this->assertNull($this->requests->id());

        $this->assertInstanceOf(NutrientRequest::class, $this->requests->id($value = 'test'));

        $this->assertEquals($value, $this->requests->id());
    }

    /** @test */
    public function it_can_get_set_a_quantity()
    {
        $this->assertNull($this->requests->quantity());

        $this->assertInstanceOf(NutrientRequest::class, $this->requests->quantity($value = 1));

        $this->assertEquals($value, $this->requests->quantity());
    }

    /** @test */
    public function it_can_get_set_a_measurement()
    {
        $this->assertNull($this->requests->measurement());

        $this->assertInstanceOf(NutrientRequest::class, $this->requests->measurement($value = 'test'));

        $this->assertEquals($value, $this->requests->measurement());
    }

    /** @test */
    public function it_can_get_set_a_ingredient()
    {
        $this->assertEmpty($this->requests->ingredient());

        $this->assertInstanceOf(NutrientRequest::class, $this->requests->ingredient($value = [
            'id' => 'a',
            'quantity' => 1,
            'measurement' => Measurement::CUP,
        ]));

        $this->assertEquals($value, $this->requests->ingredient());
    }

    /** @test */
    public function it_must_set_a_full_ingredient_or_will_through_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('You must enter a food ID, quantity and measurement URI.');

        $this->requests->results();
    }

    /** @test */
    public function it_can_fetch_a_json_response_from_the_api()
    {
        $this->requests->ingredient([
            'id' => 'food_a9zhvnmatrnpkebyfn3z2b40dfh6',
            'quantity' => 1.0,
            'measurement' => Measurement::GRAM,
        ]);

        $response = $this->requests->fetch();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
}
