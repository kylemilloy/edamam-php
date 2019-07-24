<?php

namespace Tests\Api\NutritionAnalysis;

use Tests\TestCase;
use Edamam\Api\NutritionAnalysis\Food;
use Edamam\Api\NutritionAnalysis\NutritionAnalysis;

class FoodRequestTest extends TestCase
{
    /**
     * The Food instance.
     *
     * @var \Edamam\Api\NutritionAnalysis\Food
     */
    protected $food;

    public function setUp()
    {
        parent::setUp();

        NutritionAnalysis::setApiCredentials(getenv('NUTRITION_ID'), getenv('NUTRITION_KEY'));

        $this->food = Food::create();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Food::class, new Food());
        $this->assertInstanceOf(Food::class, Food::create());
    }
}
