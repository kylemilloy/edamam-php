<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Api\Nutrition;

class NutritionTest extends TestCase
{
    /**
     * The Food instance.
     *
     * @var \Edamam\Nutrition
     */
    protected $nutrition;

    public function setUp()
    {
        parent::setUp();

        Nutrition::setApiCredentials(getenv('NUTRITION_ID'), getenv('NUTRITION_KEY'));

        $this->nutrition = Nutrition::instance();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Nutrition::class, new Nutrition());
        $this->assertInstanceOf(Nutrition::class, Nutrition::instance());
    }
}
