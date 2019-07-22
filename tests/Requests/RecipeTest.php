<?php

namespace Tests\Requests;

use Tests\TestCase;
use Edamam\Requests\RecipeSearch\Search;
use Edamam\Requests\RecipeSearch\RecipeSearch;

class RecipeTest extends TestCase
{
    /**
     * The Recipe instance.
     *
     * @var \Edamam\Requests\RecipeSearch\Search
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
