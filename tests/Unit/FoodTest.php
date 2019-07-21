<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Api\Food;

class FoodTest extends TestCase
{
    /**
     * The Food instance.
     *
     * @var \Edamam\Food
     */
    protected $food;

    public function setUp()
    {
        parent::setUp();

        Food::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));

        $this->food = Food::instance();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Food::class, new Food());
        $this->assertInstanceOf(Food::class, Food::instance());
    }

    /** @test */
    public function it_can_get_set_an_ingredient()
    {
        $this->assertNull($this->food->ingredient());

        $this->assertInstanceOf(Food::class, $this->food->ingredient($value = 'test'));

        $this->assertEquals($value, $this->food->ingredient());
    }

    /** @test */
    public function it_can_get_set_a_upc()
    {
        $this->assertNull($this->food->upc());

        $this->assertInstanceOf(Food::class, $this->food->upc($value = 'test'));

        $this->assertEquals($value, $this->food->upc());
    }

    /** @test */
    public function it_can_enable_and_disable_food_logging()
    {
        $this->assertNull($this->food->nutritionType());

        $this->assertInstanceOf(Food::class, $this->food->enableFoodLogging());

        $this->assertEquals('logging', $this->food->nutritionType());

        $this->food->disableFoodLogging();

        $this->assertNull($this->food->nutritionType());
    }

    /** @test */
    public function it_can_get_set_a_nutrition_type()
    {
        $this->assertNull($this->food->nutritionType());

        $this->assertInstanceOf(Food::class, $this->food->nutritionType($value = 'test'));

        $this->assertEquals($value, $this->food->nutritionType());
    }

    /** @test */
    public function it_can_get_set_a_health_label()
    {
        $this->assertNull($this->food->healthLabel());

        $this->assertInstanceOf(Food::class, $this->food->healthLabel($value = 'test'));

        $this->assertEquals($value, $this->food->healthLabel());
    }

    /** @test */
    public function it_can_get_set_a_calorie_range()
    {
        $this->assertNull($this->food->calories());

        $this->assertInstanceOf(Food::class, $this->food->calories($min = 1));

        $this->assertEquals($min.'+', $this->food->calories());

        $this->food->calories(0, $max = 10);

        $this->assertEquals($max, $this->food->calories());

        $this->food->calories($min, $max);

        $this->assertEquals($min.'-'.$max, $this->food->calories());
    }

    /** @test */
    public function it_can_get_set_a_minimum_calorie_value()
    {
        $this->assertNull($this->food->minimumCalories());

        $this->assertInstanceOf(Food::class, $this->food->minimumCalories($min = 1));

        $this->assertEquals($min, $this->food->minimumCalories());
        $this->assertEquals($min.'+', $this->food->calories());
    }

    /** @test */
    public function it_can_get_set_a_maximum_calorie_value()
    {
        $this->assertNull($this->food->maximumCalories());

        $this->assertInstanceOf(Food::class, $this->food->maximumCalories($max = 1));

        $this->assertEquals($max, $this->food->maximumCalories());
        $this->assertEquals($max, $this->food->calories());
    }

    /** @test */
    public function it_can_get_set_calories_via_array()
    {
        $this->assertNull($this->food->calories());

        $this->food->calories($objarr = ['minimum' => 0, 'maximum' => 1]);

        $this->assertEquals($objarr['minimum'], $this->food->minimumCalories());
        $this->assertEquals($objarr['maximum'], $this->food->maximumCalories());

        $this->food->calories($arr = [2, 3]);

        $this->assertEquals($arr[0], $this->food->minimumCalories());
        $this->assertEquals($arr[1], $this->food->maximumCalories());
    }

    /** @test */
    public function it_can_get_set_a_category()
    {
        $this->assertNull($this->food->category());

        $this->assertInstanceOf(Food::class, $this->food->category($value = 'test'));

        $this->assertEquals($value, $this->food->category());
    }

    /** @test */
    public function it_can_get_set_a_category_label()
    {
        $this->assertNull($this->food->categoryLabel());

        $this->assertInstanceOf(Food::class, $this->food->categoryLabel($value = 'test'));

        $this->assertEquals($value, $this->food->categoryLabel());
    }

    /** @test */
    public function an_ingredient_or_upc_must_be_set()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('You must enter either an ingredient or UPC code to search for');

        $this->food->results();
    }

    /** @test */
    public function if_an_ingredient_is_set_and_a_upc_is_attempted_to_be_set_it_throws_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only an ingredient or UPC may be set, not both');

        $this->food->ingredient('test');
        $this->food->upc('test');
    }

    /** @test */
    public function if_a_upc_is_set_and_an_ingredient_is_attempted_to_be_set_it_throws_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only an ingredient or UPC may be set, not both');

        $this->food->upc('test');
        $this->food->ingredient('test');
    }

    /** @test */
    public function it_can_mass_assign_parameters()
    {
        $parameters = [
            'ingredient' => 'test',
            'nutritionType' => 'test',
            'healthLabel' => 'test',
            'calories' => [0, 1],
            'category' => 'test',
            'categoryLabel' => 'test',
        ];

        $instance = Food::instance()->setQueryParameters($parameters);

        $this->assertEquals($parameters['ingredient'], $instance->ingredient());
        $this->assertEquals($parameters['nutritionType'], $instance->nutritionType());
        $this->assertEquals($parameters['healthLabel'], $instance->healthLabel());
        $this->assertEquals($parameters['calories'][0], $instance->minimumCalories());
        $this->assertEquals($parameters['calories'][1], $instance->maximumCalories());
        $this->assertEquals($parameters['category'], $instance->category());
        $this->assertEquals($parameters['categoryLabel'], $instance->categoryLabel());
    }

    /** @test */
    public function it_throws_an_exception_if_you_attempt_to_mass_assign_both_a_upc_and_ingredient()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only an ingredient or UPC may be set, not both');

        $parameters = [
            'ingredient' => 'test',
            'upc' => 'test',
        ];

        Food::instance()->setQueryParameters($parameters);
    }
}
