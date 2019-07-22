<?php

namespace Tests\Requests\NutritionAnalysis;

use Tests\TestCase;
use Edamam\Requests\NutritionAnalysis\Food;
use Edamam\Requests\NutritionAnalysis\NutritionAnalysis;

class FoodTest extends TestCase
{
    /**
     * The Food instance.
     *
     * @var \Edamam\Requests\NutritionAnalysis\Food
     */
    protected $food;

    public function setUp()
    {
        parent::setUp();

        NutritionAnalysis::setApiCredentials(getenv('NUTRITION_ID'), getenv('NUTRITION_KEY'));

        $this->food = Food::instance();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Food::class, new Food());
        $this->assertInstanceOf(Food::class, Food::instance());
    }
}
