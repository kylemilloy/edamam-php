<?php

namespace Tests\Api\NutritionAnalysis;

use Tests\TestCase;
use Edamam\Api\NutritionAnalysis\Recipe;
use Edamam\Api\NutritionAnalysis\NutritionAnalysis;

class RecipeRequestTest extends TestCase
{
    /**
     * The Food instance.
     *
     * @var \Edamam\Api\NutritionAnalysis\Recipe
     */
    protected $recipe;

    public function setUp()
    {
        parent::setUp();

        NutritionAnalysis::setApiCredentials(getenv('NUTRITION_ID'), getenv('NUTRITION_KEY'));

        $this->recipe = Recipe::create();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Recipe::class, new Recipe());
        $this->assertInstanceOf(Recipe::class, Recipe::create());
    }

    /** @test */
    public function it_can_get_set_a_url()
    {
        $this->assertNull($this->recipe->url());

        $this->assertInstanceOf(Recipe::class, $this->recipe->url($value = 'test'));

        $this->assertEquals($value, $this->recipe->url());
    }

    /** @test */
    public function it_can_get_set_its_force_reevaluation_value()
    {
        $this->assertNull($this->recipe->forceReevaluation());

        $this->assertInstanceOf(Recipe::class, $this->recipe->forceReevaluation($value = true));

        $this->assertEquals($value, $this->recipe->forceReevaluation());

        $this->recipe->disableRecipeReevaluation();

        $this->assertNull($this->recipe->forceReevaluation());

        $this->recipe->enableRecipeReevaluation();

        $this->assertTrue($this->recipe->forceReevaluation());
    }

    /** @test */
    public function it_can_get_set_an_image()
    {
        $this->assertNull($this->recipe->image());

        $this->assertInstanceOf(Recipe::class, $this->recipe->image($value = 'test'));

        $this->assertEquals($value, $this->recipe->image());
    }

    /** @test */
    public function it_can_get_set_a_yield()
    {
        $this->assertNull($this->recipe->yield());

        $this->assertInstanceOf(Recipe::class, $this->recipe->yield($value = 1));

        $this->assertEquals($value, $this->recipe->yield());
    }

    /** @test */
    public function it_can_get_set_a_cuisine()
    {
        $this->assertNull($this->recipe->cuisine());

        $this->assertInstanceOf(Recipe::class, $this->recipe->cuisine($value = 'test'));

        $this->assertEquals($value, $this->recipe->cuisine());
    }

    /** @test */
    public function it_can_get_set_a_summary()
    {
        $this->assertNull($this->recipe->summary());

        $this->assertInstanceOf(Recipe::class, $this->recipe->summary($value = 'test'));

        $this->assertEquals($value, $this->recipe->summary());
    }

    /** @test */
    public function it_can_get_set_a_dish_type()
    {
        $this->assertNull($this->recipe->dishType());

        $this->assertInstanceOf(Recipe::class, $this->recipe->dishType($value = 'test'));

        $this->assertEquals($value, $this->recipe->dishType());
    }

    /** @test */
    public function it_can_get_set_a_meal_type()
    {
        $this->assertNull($this->recipe->mealType());

        $this->assertInstanceOf(Recipe::class, $this->recipe->mealType($value = 'test'));

        $this->assertEquals($value, $this->recipe->mealType());
    }

    /** @test */
    public function it_can_get_set_a_total_preperation_time()
    {
        $this->assertNull($this->recipe->totalPreperationTime());

        $this->assertInstanceOf(Recipe::class, $this->recipe->totalPreperationTime($value = 1));

        $this->assertEquals($value, $this->recipe->totalPreperationTime());
    }

    /** @test */
    public function it_can_get_set_an_array_of_ingredient()
    {
        $this->assertEmpty($this->recipe->ingredients());

        $this->assertInstanceOf(Recipe::class, $this->recipe->ingredients($value = 'test'));

        $this->assertEquals([$value], $this->recipe->ingredients());

        $this->recipe->ingredients($value = [1, 2, 3]);

        $this->assertEquals($value, $this->recipe->ingredients());
    }

    /** @test */
    public function it_can_get_set_instructions()
    {
        $this->assertNull($this->recipe->instructions());

        $this->assertInstanceOf(Recipe::class, $this->recipe->instructions($value = 'test'));

        $this->assertEquals($value, $this->recipe->instructions());
    }
}
