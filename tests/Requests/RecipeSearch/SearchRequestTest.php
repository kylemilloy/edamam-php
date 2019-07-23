<?php

namespace Tests\Api;

use Tests\TestCase;
use Edamam\Api\RecipeSearch\Search;
use Edamam\Api\RecipeSearch\RecipeSearch;

class SearchRequestTest extends TestCase
{
    /**
     * The Recipe instance.
     *
     * @var \Edamam\Api\RecipeSearch\Search
     */
    protected $search;

    public function setUp()
    {
        parent::setUp();

        RecipeSearch::setApiCredentials(getenv('RECIPE_ID'), getenv('RECIPE_KEY'));

        $this->search = Search::instance();
    }

    /** @test */
    public function it_can_return_an_instance_of_itself()
    {
        $this->assertInstanceOf(Search::class, new Search());
        $this->assertInstanceOf(Search::class, Search::instance());
    }
}
