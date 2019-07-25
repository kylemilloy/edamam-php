<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Models\Food;
use Edamam\Repositories\NutrientRepository;

class FoodTest extends TestCase
{
    public function setUp()
    {
        $this->food = Food::create([
            'foodId' => '',
            'brand' => '',
            'image' => '',
            'label' => '',
            'category' => '',
            'nutrients' => [],
            'categoryLabel' => '',
        ]);
    }

    /** @test */
    public function it_casts_nutrients_to_a_repo()
    {
        $this->assertInstanceOf(NutrientRepository::class, $this->food->nutrients);
    }
}
