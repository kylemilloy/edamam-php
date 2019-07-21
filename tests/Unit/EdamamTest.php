<?php

namespace Tests\Unit;

use Edamam\Edamam;
use Tests\TestCase;
use Edamam\Api\Food;

class EdamamTest extends TestCase
{
    /**
     * The Food instance.
     *
     * @var \Edamam\Edamam
     */
    protected $edamam;

    public function setUp()
    {
        parent::setUp();

        Edamam::setApiCredentials(getenv('EDAMAM_ID'), getenv('EDAMAM_KEY'));
    }

    /** @test */
    public function it_can_set_its_credentials()
    {
        $this->assertInstanceOf(Edamam::class, Edamam::setApiCredentials(getenv('EDAMAM_ID'), getenv('EDAMAM_KEY')));
    }

    /** @test */
    public function it_can_return_a_food_api_instance()
    {
        $this->assertInstanceOf(Food::class, Edamam::food());
    }
}
