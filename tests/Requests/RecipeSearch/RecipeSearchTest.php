<?php

namespace Tests\Requests\RecipeSearch;

use Tests\TestCase;
use Edamam\Requests\RecipeSearch\Search;
use Edamam\Requests\RecipeSearch\RecipeSearch;

class RecipeSearchTest extends TestCase
{
    /** @test */
    public function it_holds_reference_to_its_two_request_types()
    {
        $this->assertInstanceOf(Search::class, RecipeSearch::search());
    }

    /** @test */
    public function it_can_get_and_set_its_api_credentials()
    {
        RecipeSearch::setApiCredentials(null, null);

        $credentials = RecipeSearch::getApiCredentials();
        $this->assertNull($credentials['app_id']);
        $this->assertNull($credentials['app_key']);

        RecipeSearch::setApiCredentials($id = 'foo', $key = 'bar');

        $credentials = RecipeSearch::getApiCredentials();
        $this->assertEquals($id, $credentials['app_id']);
        $this->assertEquals($key, $credentials['app_key']);
    }
}
