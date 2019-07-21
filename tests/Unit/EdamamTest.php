<?php

namespace Tests\Unit;

use Edamam\Edamam;
use Tests\TestCase;
use Edamam\Api\Food;

class EdamamTest extends TestCase
{
    /** @test */
    public function it_can_return_a_food_api_instance()
    {
        $this->assertInstanceOf(Food::class, Edamam::food(getenv('FOOD_ID'), getenv('FOOD_KEY')));
    }
}
