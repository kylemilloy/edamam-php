<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Models\Food;

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
            'nutrients' => '',
            'measurement' => '',
            'categoryLabel' => '',
        ]);
    }
}
