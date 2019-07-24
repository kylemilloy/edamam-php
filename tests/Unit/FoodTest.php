<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Models\Food;
use Edamam\Repositories\MeasurementRepository;
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
            'measurements' => [],
            'categoryLabel' => '',
        ]);
    }

    /** @test */
    public function it_casts_measurements_to_a_repo()
    {
        $this->assertInstanceOf(MeasurementRepository::class, $this->food->measurements);
    }

    /** @test */
    public function it_casts_nutrients_to_a_repo()
    {
        $this->assertInstanceOf(NutrientRepository::class, $this->food->nutrients);
    }
}
