<?php

namespace Tests\Api\FoodDatabase;

use Tests\TestCase;
use Edamam\Support\Measurement;
use Edamam\Api\FoodDatabase\Nutrients;
use Edamam\Api\FoodDatabase\FoodDatabase;

class NutrientsTest extends TestCase
{
    /**
     * The Parser instance.
     *
     * @var \Edamam\Api\FoodDatabase\Nutrients
     */
    protected $nutrients;

    public function setUp()
    {
        parent::setUp();

        FoodDatabase::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));

        $this->nutrients = Nutrients::instance();
    }

    /** @test */
    public function the_nutrients_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Nutrients::class, new Nutrients());
        $this->assertInstanceOf(Nutrients::class, Nutrients::instance());
    }

    /** @test */
    public function it_can_get_set_a_yield()
    {
        $this->assertNull($this->nutrients->yield());

        $this->assertInstanceOf(Nutrients::class, $this->nutrients->yield($value = 1));

        $this->assertEquals($value, $this->nutrients->yield());
    }

    /** @test */
    public function it_can_get_set_a_id()
    {
        $this->assertNull($this->nutrients->id());

        $this->assertInstanceOf(Nutrients::class, $this->nutrients->id($value = 'test'));

        $this->assertEquals($value, $this->nutrients->id());
    }

    /** @test */
    public function it_can_get_set_a_quantity()
    {
        $this->assertNull($this->nutrients->quantity());

        $this->assertInstanceOf(Nutrients::class, $this->nutrients->quantity($value = 1));

        $this->assertEquals($value, $this->nutrients->quantity());
    }

    /** @test */
    public function it_can_get_set_a_measurement()
    {
        $this->assertNull($this->nutrients->measurement());

        $this->assertInstanceOf(Nutrients::class, $this->nutrients->measurement($value = 'test'));

        $this->assertEquals($value, $this->nutrients->measurement());
    }

    /** @test */
    public function it_can_get_set_a_ingredient()
    {
        $this->assertEmpty($this->nutrients->ingredient());

        $this->assertInstanceOf(Nutrients::class, $this->nutrients->ingredient($value = [
            'id' => 'a',
            'quantity' => 1,
            'measurement' => Measurement::CUP,
        ]));

        $this->assertEquals($value, $this->nutrients->ingredient());
    }

    /** @test */
    public function it_must_set_a_full_ingredient_or_will_through_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('You must enter a food ID, quantity and measurement URI.');

        $this->nutrients->results();
    }

    /** @test */
    public function it_can_fetch_a_json_response_from_the_api()
    {
        // skip CI testing
        if (!$this->canAuthenticateWithApi('FOOD_ID', 'FOOD_KEY')) {
            $this->assertTrue(true);

            return;
        }

        $this->nutrients->ingredient([
            'id' => 'food_a9zhvnmatrnpkebyfn3z2b40dfh6',
            'quantity' => 1.0,
            'measurement' => Measurement::GRAM,
        ]);

        $response = $this->nutrients->fetch();
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
    }
}
