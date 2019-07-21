<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Api\NutritionAnalysis\Nutrition;

class NutritionTest extends TestCase
{
    /**
     * The Food instance.
     *
     * @var \Edamam\Nutrition
     */
    protected $nutrition;

    public function setUp()
    {
        parent::setUp();

        Nutrition::setApiCredentials(getenv('NUTRITION_ID'), getenv('NUTRITION_KEY'));

        $this->nutrition = Nutrition::instance();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Nutrition::class, new Nutrition());
        $this->assertInstanceOf(Nutrition::class, Nutrition::instance());
    }

    /** @test */
    public function it_can_get_set_a_url()
    {
        $this->assertNull($this->nutrition->url());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->url($value = 'test'));

        $this->assertEquals($value, $this->nutrition->url());
    }

    /** @test */
    public function it_can_get_set_its_force_reevaluation_value()
    {
        $this->assertNull($this->nutrition->forceReevaluation());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->forceReevaluation($value = true));

        $this->assertEquals($value, $this->nutrition->forceReevaluation());

        $this->nutrition->disableRecipeReevaluation();

        $this->assertNull($this->nutrition->forceReevaluation());

        $this->nutrition->enableRecipeReevaluation();

        $this->assertTrue($this->nutrition->forceReevaluation());
    }

    /** @test */
    public function it_can_get_set_an_image()
    {
        $this->assertNull($this->nutrition->image());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->image($value = 'test'));

        $this->assertEquals($value, $this->nutrition->image());
    }

    /** @test */
    public function it_can_get_set_a_yield()
    {
        $this->assertNull($this->nutrition->yield());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->yield($value = 1));

        $this->assertEquals($value, $this->nutrition->yield());
    }

    /** @test */
    public function it_can_get_set_a_cuisine()
    {
        $this->assertNull($this->nutrition->cuisine());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->cuisine($value = 'test'));

        $this->assertEquals($value, $this->nutrition->cuisine());
    }

    /** @test */
    public function it_can_get_set_a_summary()
    {
        $this->assertNull($this->nutrition->summary());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->summary($value = 'test'));

        $this->assertEquals($value, $this->nutrition->summary());
    }

    /** @test */
    public function it_can_get_set_a_dish_type()
    {
        $this->assertNull($this->nutrition->dishType());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->dishType($value = 'test'));

        $this->assertEquals($value, $this->nutrition->dishType());
    }

    /** @test */
    public function it_can_get_set_a_meal_type()
    {
        $this->assertNull($this->nutrition->mealType());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->mealType($value = 'test'));

        $this->assertEquals($value, $this->nutrition->mealType());
    }

    /** @test */
    public function it_can_get_set_a_total_preperation_time()
    {
        $this->assertNull($this->nutrition->totalPreperationTime());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->totalPreperationTime($value = 1));

        $this->assertEquals($value, $this->nutrition->totalPreperationTime());
    }

    /** @test */
    public function it_can_get_set_an_array_of_ingredient()
    {
        $this->assertEmpty($this->nutrition->ingredients());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->ingredients($value = 'test'));

        $this->assertEquals([$value], $this->nutrition->ingredients());

        $this->nutrition->ingredients($value = [1, 2, 3]);

        $this->assertEquals($value, $this->nutrition->ingredients());
    }

    /** @test */
    public function it_can_get_set_instructions()
    {
        $this->assertNull($this->nutrition->instructions());

        $this->assertInstanceOf(Nutrition::class, $this->nutrition->instructions($value = 'test'));

        $this->assertEquals($value, $this->nutrition->instructions());
    }

    /** @test */
    public function it_can_fetch_a_json_response_from_the_api()
    {
        $response = $this->nutrition
            ->title('Breakfast of Champions')
            ->ingredients('beer')
            ->fetch();

        $json = $this->nutrition->results();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody());
        $this->assertJson($json);
    }
}
