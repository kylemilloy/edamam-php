<?php

namespace Tests\Api;

use Tests\TestCase;
use Edamam\Api\FoodDatabase\FoodRequest;
use Edamam\Api\FoodDatabase\FoodDatabase;
use Tightenco\Collect\Support\Collection;
use Edamam\Models\Food;
use Edamam\Repositories\NutrientRepository;

class FoodResponseTest extends TestCase
{
    public function setUp(): void
    {
        FoodDatabase::setApiCredentials(getenv('FOOD_ID'), getenv('FOOD_KEY'));

        $this->response = FoodRequest::query(['ingredient' => 'beer']);
    }

    /** @test */
    public function its_results_is_a_collection_of_food_models()
    {
        $this->assertInstanceOf(Collection::class, $this->response->results());
        $this->assertInstanceOf(Food::class, $this->response->results()->first());
    }

    /** @test */
    public function it_casts_nutrients_to_a_repository()
    {
        $this->assertInstanceOf(NutrientRepository::class, $this->response->results()->first()->nutrients);
    }
}
