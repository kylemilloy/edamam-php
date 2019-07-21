<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Api\Recipe;

class RecipeTest extends TestCase
{
    /**
     * The Recipe instance.
     *
     * @var \Edamam\Recipe
     */
    protected $recipe;

    public function setUp()
    {
        parent::setUp();

        Recipe::setApiCredentials(getenv('RECIPE_ID'), getenv('RECIPE_KEY'));

        $this->recipe = Recipe::instance();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Recipe::class, new Recipe());
        $this->assertInstanceOf(Recipe::class, Recipe::instance());
    }
}
