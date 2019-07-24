<?php

namespace Tests\Repositories;

use Edamam\Repositories\Repository;
use Tightenco\Collect\Support\Collection;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
    public function setUp(): void
    {
        $this->repository = Repository::create(['key' => 'value']);
    }

    /** @test */
    public function it_creates_a_collection()
    {
        $this->assertInstanceOf(Collection::class, $this->repository->all());
    }

    /** @test */
    public function it_can_get_a_value_from_its_collection()
    {
        $this->assertEquals('value', $this->repository->get('key'));
    }
}
