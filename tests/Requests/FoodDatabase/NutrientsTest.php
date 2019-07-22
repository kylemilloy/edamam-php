<?php

namespace Tests\Requests\FoodDatabase;

use Tests\TestCase;
use Edamam\Requests\FoodDatabase\Parser;
use Edamam\Requests\FoodDatabase\Nutrients;
use Edamam\Requests\FoodDatabase\FoodDatabase;

class NutrientsTest extends TestCase
{
    /**
     * The Parser instance.
     *
     * @var \Edamam\Requests\FoodDatabase\Nutrients
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
}
