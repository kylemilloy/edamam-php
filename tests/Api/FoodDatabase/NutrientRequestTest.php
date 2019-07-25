<?php

namespace Tests\Api\FoodDatabase;

use Tests\TestCase;
use Edamam\Support\Measurement;
use Edamam\Api\FoodDatabase\FoodDatabase;
use Edamam\Api\FoodDatabase\NutrientRequest;
use Edamam\Api\FoodDatabase\NutrientResponse;

class NutrientRequestTest extends TestCase
{
    /**
     * The FoodRequest instance.
     *
     * @var \Edamam\Api\FoodDatabase\NutrientRequest
     */
    protected $request;

    public function setUp()
    {
        parent::setUp();

        FoodDatabase::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));

        $this->request = NutrientRequest::create();
    }

    /** @test */
    public function the_nutrients_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(NutrientRequest::class, new NutrientRequest());
        $this->assertInstanceOf(NutrientRequest::class, NutrientRequest::create());
    }

    /** @test */
    public function it_can_get_set_a_yield()
    {
        $this->assertNull($this->request->yield());

        $this->assertInstanceOf(NutrientRequest::class, $this->request->yield($value = 1));

        $this->assertEquals($value, $this->request->yield());
    }

    /** @test */
    public function it_can_get_set_a_id()
    {
        $this->assertNull($this->request->id());

        $this->assertInstanceOf(NutrientRequest::class, $this->request->id($value = 'test'));

        $this->assertEquals($value, $this->request->id());
    }

    /** @test */
    public function it_can_get_set_a_quantity()
    {
        $this->assertNull($this->request->quantity());

        $this->assertInstanceOf(NutrientRequest::class, $this->request->quantity($value = 1));

        $this->assertEquals($value, $this->request->quantity());
    }

    /** @test */
    public function it_can_get_set_a_measurement()
    {
        $this->assertNull($this->request->measurement());

        $this->assertInstanceOf(NutrientRequest::class, $this->request->measurement($value = 'test'));

        $this->assertEquals($value, $this->request->measurement());
    }

    /** @test */
    public function it_can_get_set_a_ingredient()
    {
        $this->assertEmpty($this->request->ingredient());

        $this->assertInstanceOf(NutrientRequest::class, $this->request->ingredient($value = [
            'id' => 'a',
            'quantity' => 1,
            'measurement' => Measurement::CUP,
        ]));

        $this->assertEquals($value, $this->request->ingredient());
    }

    /** @test */
    public function it_must_set_a_full_ingredient_or_will_through_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('You must enter a food ID, quantity and measurement URI.');

        $this->request->fetch();
    }

    /** @test */
    public function it_can_fetch_a_json_response_from_the_api()
    {
        $this->request->ingredient([
            'id' => 'food_a9zhvnmatrnpkebyfn3z2b40dfh6',
            'quantity' => 1.0,
            'measurement' => Measurement::GRAM,
        ]);

        $this->assertNotNull($response = $this->request->response());
    }

    /** @test */
    public function the_response_returns_a_response_instance()
    {
        $this->request->ingredient([
            'id' => 'food_a9zhvnmatrnpkebyfn3z2b40dfh6',
            'quantity' => 1.0,
            'measurement' => Measurement::GRAM,
        ]);

        $this->assertInstanceOf(NutrientResponse::class, $this->request->response());
    }
}
