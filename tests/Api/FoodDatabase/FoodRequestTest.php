<?php

namespace Tests\Api\FoodDatabase;

use Tests\TestCase;
use Edamam\Api\Response;
use Edamam\Support\Health;
use Edamam\Api\FoodDatabase\FoodRequest;
use Edamam\Api\FoodDatabase\FoodDatabase;
use Edamam\Api\FoodDatabase\FoodResponse;

class FoodRequestTest extends TestCase
{
    /**
     * The FoodRequest instance.
     *
     * @var \Edamam\Api\FoodDatabase\FoodRequest
     */
    protected $request;

    public function setUp()
    {
        parent::setUp();

        FoodDatabase::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));

        $this->request = FoodRequest::create();
    }

    /** @test */
    public function the_food_request_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(FoodRequest::class, new FoodRequest());
        $this->assertInstanceOf(FoodRequest::class, FoodRequest::create());
    }

    /** @test */
    public function it_can_get_set_an_ingredient()
    {
        $this->assertNull($this->request->ingredient());

        $this->assertInstanceOf(FoodRequest::class, $this->request->ingredient($value = 'test'));

        $this->assertEquals($value, $this->request->ingredient());
    }

    /** @test */
    public function it_can_get_set_a_upc()
    {
        $this->assertNull($this->request->upc());

        $this->assertInstanceOf(FoodRequest::class, $this->request->upc($value = 'test'));

        $this->assertEquals($value, $this->request->upc());
    }

    /** @test */
    public function it_can_get_set_a_page()
    {
        $this->assertNull($this->request->page());

        $this->assertInstanceOf(FoodRequest::class, $this->request->page($value = 2));

        $this->assertEquals($value, $this->request->page());
    }

    /** @test */
    public function it_can_enable_and_disable_food_logging()
    {
        $this->assertNull($this->request->nutritionType());

        $this->assertInstanceOf(FoodRequest::class, $this->request->enableFoodLogging());

        $this->assertEquals('logging', $this->request->nutritionType());

        $this->request->disableFoodLogging();

        $this->assertNull($this->request->nutritionType());
    }

    /** @test */
    public function it_can_get_set_a_nutrition_type()
    {
        $this->assertNull($this->request->nutritionType());

        $this->assertInstanceOf(FoodRequest::class, $this->request->nutritionType($value = 'test'));

        $this->assertEquals($value, $this->request->nutritionType());
    }

    /** @test */
    public function it_can_get_set_a_health_label()
    {
        $this->assertNull($this->request->healthLabel());

        $this->assertInstanceOf(FoodRequest::class, $this->request->healthLabel($value = ['test']));

        $this->assertSame($value, $this->request->healthLabel());
    }

    /** @test */
    public function it_can_get_set_a_minimum_calorie()
    {
        $this->assertNull($this->request->minimumCalories());

        $this->assertInstanceOf(FoodRequest::class, $this->request->minimumCalories($value = 10));

        $this->assertEquals("$value", $this->request->minimumCalories());
    }

    /** @test */
    public function it_can_get_set_a_maximum_calorie()
    {
        $this->assertNull($this->request->maximumCalories());

        $this->assertInstanceOf(FoodRequest::class, $this->request->maximumCalories($value = 10));

        $this->assertEquals($value, $this->request->maximumCalories());
    }

    /** @test */
    public function it_can_get_set_a_calorie_range()
    {
        $this->assertNull($this->request->calories());

        $this->assertInstanceOf(FoodRequest::class, $this->request->calories($min = 1));

        // Setting only a min results in "$min+"
        $this->assertEquals("$min+", $this->request->calories());

        // setting only a max results in $max
        $this->request->calories(0, $max = 10);
        $this->assertEquals($max, $this->request->calories());

        // setting both values results in "$min-$max"
        $this->request->calories($min, $max);
        $this->assertEquals("$min-$max", $this->request->calories());

        // The above but using array syntax
        $min = 10;
        $max = 100;

        $this->request->calories(['minimum' => $min]);
        $this->assertEquals("$min+", $this->request->calories());

        $this->request->calories(['maximum' => $max]);
        $this->assertEquals("$max", $this->request->calories());

        $this->request->calories(['maximum' => $max = 100, 'minimum' => $min = 10]);
        $this->assertEquals("$min-$max", $this->request->calories());

        // Setting min/max to 0 results in null
        $this->request->calories(['minimum' => $min = 0, 'maximum' => $max = 10]);
        $this->assertEquals($max, $this->request->calories());
        $this->request->calories(['minimum' => $min = 10, 'maximum' => $max = 0]);
        $this->assertEquals("$min+", $this->request->calories());
    }

    /** @test */
    public function it_can_get_set_a_minimum_calorie_value()
    {
        $this->assertNull($this->request->minimumCalories());

        $this->assertInstanceOf(FoodRequest::class, $this->request->minimumCalories($min = 1));

        $this->assertEquals($min, $this->request->minimumCalories());
        $this->assertEquals($min.'+', $this->request->calories());
    }

    /** @test */
    public function it_can_get_set_a_maximum_calorie_value()
    {
        $this->assertNull($this->request->maximumCalories());

        $this->assertInstanceOf(FoodRequest::class, $this->request->maximumCalories($max = 1));

        $this->assertEquals($max, $this->request->maximumCalories());
        $this->assertEquals($max, $this->request->calories());
    }

    /** @test */
    public function it_can_get_set_calories_via_array()
    {
        $this->assertNull($this->request->calories());

        $this->request->calories($values = ['minimum' => 0, 'maximum' => 1]);

        $this->assertEquals($values['minimum'], $this->request->minimumCalories());
        $this->assertEquals($values['maximum'], $this->request->maximumCalories());
    }

    /** @test */
    public function it_can_get_set_a_category()
    {
        $this->assertNull($this->request->category());

        $this->assertInstanceOf(FoodRequest::class, $this->request->category($value = 'test'));

        $this->assertEquals($value, $this->request->category());
    }

    /** @test */
    public function it_can_get_set_a_category_label()
    {
        $this->assertNull($this->request->categoryLabel());

        $this->assertInstanceOf(FoodRequest::class, $this->request->categoryLabel($value = ['test']));

        $this->assertEquals($value, $this->request->categoryLabel());
    }

    /** @test */
    public function an_ingredient_or_upc_must_be_set()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('You must enter either an ingredient or UPC code to search for');

        $this->request->fetch();
    }

    /** @test */
    public function if_an_ingredient_is_set_and_a_upc_is_attempted_to_be_set_it_throws_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only an ingredient or UPC may be set, not both');

        $this->request->ingredient('test');
        $this->request->upc('test');
    }

    /** @test */
    public function if_a_upc_is_set_and_an_ingredient_is_attempted_to_be_set_it_throws_an_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Only an ingredient or UPC may be set, not both');

        $this->request->upc('test');
        $this->request->ingredient('test');
    }

    /** @test */
    public function it_can_mass_assign_parameters()
    {
        $parameters = [
            'ingredient' => 'test',
            'nutritionType' => 'test',
            'healthLabel' => ['test'],
            'calories' => [
                'minimum' => 5,
                'maximum' => 10,
            ],
            'category' => 'test',
            'categoryLabel' => ['test'],
        ];

        $instance = FoodRequest::create()->setQueryParameters($parameters);

        $this->assertEquals($parameters['ingredient'], $instance->ingredient());
        $this->assertEquals($parameters['nutritionType'], $instance->nutritionType());
        $this->assertEquals($parameters['healthLabel'], $instance->healthLabel());
        $this->assertEquals($parameters['calories']['minimum'], $instance->minimumCalories());
        $this->assertEquals($parameters['calories']['maximum'], $instance->maximumCalories());
        $this->assertEquals($parameters['category'], $instance->category());
        $this->assertEquals($parameters['categoryLabel'], $instance->categoryLabel());
    }

    /** @test */
    public function it_can_execute_a_quick_search_with_shorthand()
    {
        $results = FoodRequest::find(['ingredient' => 'beer']);

        $this->assertInstanceOf(Response::class, $results);
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

        FoodRequest::create()->setQueryParameters($parameters);
    }

    /** @test */
    public function it_can_fetch_a_json_response_from_the_api()
    {
        $this->request->ingredient('beer')->fetch();

        $this->assertJson((string) $this->request->response()->raw()->getBody());
    }

    /** @test */
    public function the_response_returns_a_response_instance()
    {
        $this->request->ingredient('beer');

        $this->assertInstanceOf(FoodResponse::class, $this->request->response());
    }

    /** @test */
    public function it_can_get_a_result_from_a_upc()
    {
        $this->request->upc('034100572563');

        $this->assertJson($this->request->response()->results()->toJson());
    }

    /** @test */
    public function it_can_get_a_result_from_a_calorie_range()
    {
        $this->request->ingredient('beer')
            ->minimumCalories(200);

        $this->assertJson($this->request->response()->results()->toJson());
    }

    /** @test */
    public function it_can_get_a_result_from_a_health_label()
    {
        $this->request->ingredient('beer')
            ->healthLabel(Health::ALCOHOL_FREE);

        $this->assertJson($this->request->response()->results()->toJson());
    }

    /** @test */
    public function it_can_get_a_result_from_a_category_label()
    {
        $this->request->ingredient('beer')
            ->categoryLabel('meal');

        $this->assertJson($this->request->response()->results()->toJson());
    }

    /** @test */
    public function it_can_get_a_result_from_a_category()
    {
        $this->request->ingredient('beer')
            ->category('generic-foods');

        $this->assertJson($this->request->response()->results()->toJson());
    }

    /** @test */
    public function it_can_get_results_after_enabling_nutrition_logging()
    {
        $this->request->ingredient('beer')
            ->enableFoodLogging();

        $this->assertJson($this->request->response()->results()->toJson());
    }
}
