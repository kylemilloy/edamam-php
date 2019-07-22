<?php

namespace Tests\Requests\NutritionAnalysis;

use Tests\TestCase;
use Edamam\Requests\NutritionAnalysis\Recipe;
use Edamam\Requests\NutritionAnalysis\NutritionAnalysis;
use Edamam\Requests\NutritionAnalysis\Food;

class NutritionAnalysisTest extends TestCase
{
    /** @test */
    public function it_holds_reference_to_its_two_request_types()
    {
        $this->assertInstanceOf(Recipe::class, NutritionAnalysis::recipe());
        $this->assertInstanceOf(Food::class, NutritionAnalysis::food());
    }

    /** @test */
    public function it_can_get_and_set_its_api_credentials()
    {
        NutritionAnalysis::setApiCredentials(null, null);

        $credentials = NutritionAnalysis::getApiCredentials();
        $this->assertNull($credentials['app_id']);
        $this->assertNull($credentials['app_key']);

        NutritionAnalysis::setApiCredentials($id = 'foo', $key = 'bar');

        $credentials = NutritionAnalysis::getApiCredentials();
        $this->assertEquals($id, $credentials['app_id']);
        $this->assertEquals($key, $credentials['app_key']);
    }
}
