<?php

namespace Tests\Api\FoodDatabase;

use Tests\TestCase;
use Edamam\Api\FoodDatabase\Parser;
use Edamam\Api\FoodDatabase\Nutrients;
use Edamam\Api\FoodDatabase\FoodDatabase;

class FoodDatabaseTest extends TestCase
{
    /** @test */
    public function it_holds_reference_to_its_two_request_types()
    {
        $this->assertInstanceOf(Parser::class, FoodDatabase::parser());
        $this->assertInstanceOf(Nutrients::class, FoodDatabase::nutrients());
    }

    /** @test */
    public function it_can_get_and_set_its_api_credentials()
    {
        FoodDatabase::setApiCredentials(null, null);

        $credentials = FoodDatabase::getApiCredentials();
        $this->assertNull($credentials['app_id']);
        $this->assertNull($credentials['app_key']);

        FoodDatabase::setApiCredentials($id = 'foo', $key = 'bar');

        $credentials = FoodDatabase::getApiCredentials();
        $this->assertEquals($id, $credentials['app_id']);
        $this->assertEquals($key, $credentials['app_key']);
    }
}
