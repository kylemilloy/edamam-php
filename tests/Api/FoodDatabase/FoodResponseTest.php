<?php

namespace Tests\Api;

use Tests\TestCase;
use Edamam\Api\FoodDatabase\FoodRequest;
use Edamam\Api\FoodDatabase\FoodDatabase;
use Tightenco\Collect\Support\Collection;
use Edamam\Models\Food;
use Edamam\Repositories\NutrientRepository;
use Edamam\Repositories\MeasurementRepository;

class FoodResponseTest extends TestCase
{
    public function setUp(): void
    {
        FoodDatabase::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));
    }

    /** @test */
    public function its_results_is_a_collection_of_food_models()
    {
        $results = FoodRequest::find(['ingredient' => 'beer'])->results();

        $this->assertInstanceOf(Collection::class, $results);
        $this->assertInstanceOf(Food::class, $results->first());
    }

    /** @test */
    public function it_casts_nutrients_to_a_repository()
    {
        $results = FoodRequest::find(['ingredient' => 'beer'])->results();

        $this->assertInstanceOf(NutrientRepository::class, $results->first()->nutrients);
    }

    /** @test */
    public function it_casts_measurements_to_a_repository()
    {
        $results = FoodRequest::find(['ingredient' => 'beer'])->results();

        $this->assertInstanceOf(MeasurementRepository::class, $results->first()->measurements);
    }
}
