<?php

namespace Tests\Requests;

use Tests\TestCase;
use Edamam\Requests\FoodDatabase\Parser;
use Edamam\Requests\FoodDatabase\Nutrients;
use Edamam\Requests\FoodDatabase\FoodDatabase;

class FoodDatabaseTest extends TestCase
{
    /**
     * The Parser instance.
     *
     * @var \Edamam\Requests\FoodDatabase\Parser
     */
    protected $parser;

    public function setUp()
    {
        parent::setUp();

        FoodDatabase::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));

        $this->parser = Parser::instance();
    }

    /** @test */
    public function the_parser_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Parser::class, new Parser());
        $this->assertInstanceOf(Parser::class, Parser::instance());
    }

    /** @test */
    public function the_nutrients_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Nutrients::class, new Nutrients());
        $this->assertInstanceOf(Nutrients::class, Nutrients::instance());
    }

    /** @test */
    public function it_can_get_set_an_ingredient()
    {
        $this->assertNull($this->parser->ingredient());

        $this->assertInstanceOf(Parser::class, $this->parser->ingredient($value = 'test'));

        $this->assertEquals($value, $this->parser->ingredient());
    }

    /** @test */
    public function it_can_get_set_a_upc()
    {
        $this->assertNull($this->parser->upc());

        $this->assertInstanceOf(Parser::class, $this->parser->upc($value = 'test'));

        $this->assertEquals($value, $this->parser->upc());
    }

    /** @test */
    public function it_can_enable_and_disable_food_logging()
    {
        $this->assertNull($this->parser->nutritionType());

        $this->assertInstanceOf(Parser::class, $this->parser->enableFoodLogging());

        $this->assertEquals('logging', $this->parser->nutritionType());

        $this->parser->disableFoodLogging();

        $this->assertNull($this->parser->nutritionType());
    }

    /** @test */
    public function it_can_get_set_a_nutrition_type()
    {
        $this->assertNull($this->parser->nutritionType());

        $this->assertInstanceOf(Parser::class, $this->parser->nutritionType($value = 'test'));

        $this->assertEquals($value, $this->parser->nutritionType());
    }

    /** @test */
    public function it_can_get_set_a_health_label()
    {
        $this->assertNull($this->parser->healthLabel());

        $this->assertInstanceOf(Parser::class, $this->parser->healthLabel($value = 'test'));

        $this->assertEquals($value, $this->parser->healthLabel());
    }

    /** @test */
    public function it_can_get_set_a_calorie_range()
    {
        $this->assertNull($this->parser->calories());

        $this->assertInstanceOf(Parser::class, $this->parser->calories($min = 1));

        $this->assertEquals($min.'+', $this->parser->calories());

        $this->parser->calories(0, $max = 10);

        $this->assertEquals($max, $this->parser->calories());

        $this->parser->calories($min, $max);

        $this->assertEquals($min.'-'.$max, $this->parser->calories());
    }

    /** @test */
    public function it_can_get_set_a_minimum_calorie_value()
    {
        $this->assertNull($this->parser->minimumCalories());

        $this->assertInstanceOf(Parser::class, $this->parser->minimumCalories($min = 1));

        $this->assertEquals($min, $this->parser->minimumCalories());
        $this->assertEquals($min.'+', $this->parser->calories());
    }

    /** @test */
    public function it_can_get_set_a_maximum_calorie_value()
    {
        $this->assertNull($this->parser->maximumCalories());

        $this->assertInstanceOf(Parser::class, $this->parser->maximumCalories($max = 1));

        $this->assertEquals($max, $this->parser->maximumCalories());
        $this->assertEquals($max, $this->parser->calories());
    }

    /** @test */
    public function it_can_get_set_calories_via_array()
    {
        $this->assertNull($this->parser->calories());

        $this->parser->calories($objarr = ['minimum' => 0, 'maximum' => 1]);

        $this->assertEquals($objarr['minimum'], $this->parser->minimumCalories());
        $this->assertEquals($objarr['maximum'], $this->parser->maximumCalories());

        $this->parser->calories($arr = [2, 3]);

        $this->assertEquals($arr[0], $this->parser->minimumCalories());
        $this->assertEquals($arr[1], $this->parser->maximumCalories());
    }

    /** @test */
    public function it_can_get_set_a_category()
    {
        $this->assertNull($this->parser->category());

        $this->assertInstanceOf(Parser::class, $this->parser->category($value = 'test'));

        $this->assertEquals($value, $this->parser->category());
    }

    /** @test */
    public function it_can_get_set_a_category_label()
    {
        $this->assertNull($this->parser->categoryLabel());

        $this->assertInstanceOf(Parser::class, $this->parser->categoryLabel($value = 'test'));

        $this->assertEquals($value, $this->parser->categoryLabel());
    }

    /** @test */
    public function an_ingredient_or_upc_must_be_set()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('You must enter either an ingredient or UPC code to search for');

        $this->parser->results();
    }

    /** @test */
    public function if_an_ingredient_is_set_and_a_upc_is_attempted_to_be_set_it_throws_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only an ingredient or UPC may be set, not both');

        $this->parser->ingredient('test');
        $this->parser->upc('test');
    }

    /** @test */
    public function if_a_upc_is_set_and_an_ingredient_is_attempted_to_be_set_it_throws_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only an ingredient or UPC may be set, not both');

        $this->parser->upc('test');
        $this->parser->ingredient('test');
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

        $instance = Parser::instance()->setQueryParameters($parameters);

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

        Parser::instance()->setQueryParameters($parameters);
    }

    /** @test */
    public function it_can_fetch_a_json_response_from_the_api()
    {
        // skip CI testing
        if (!$this->canAuthenticateWithApi('FOOD_ID', 'FOOD_KEY')) {
            $this->assertTrue(true);

            return;
        }

        $response = $this->parser->ingredient('beer')->fetch();
        $json = json_encode($this->parser->results());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
        $this->assertJson($json);
    }
}
