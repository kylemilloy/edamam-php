<?php

namespace Tests\Unit;

use Edamam\Edamam;
use Tests\TestCase;
use Edamam\Api\FoodDatabase\Food;
use Edamam\Api\RecipeSearch\Recipe;
use Edamam\Api\NutritionAnalysis\Nutrition;

class EdamamTest extends TestCase
{
    /** @test */
    public function it_can_return_a_food_api_instance()
    {
        $this->assertInstanceOf(Food::class, Edamam::food(getenv('FOOD_ID'), getenv('FOOD_KEY')));
    }

    /** @test */
    public function it_can_return_a_nutrition_api_instance()
    {
        $this->assertInstanceOf(Nutrition::class, Edamam::nutrition(getenv('FOOD_ID'), getenv('FOOD_KEY')));
    }

    /** @test */
    public function it_can_return_a_recipe_api_instance()
    {
        $this->assertInstanceOf(Recipe::class, Edamam::recipe(getenv('FOOD_ID'), getenv('FOOD_KEY')));
    }
}
