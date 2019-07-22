<?php

namespace Tests\Support;

use Tests\TestCase;
use Edamam\Support\Diet;

class DietTest extends TestCase
{
    /** @test */
    public function it_has_a_balanced_const()
    {
        $this->assertEquals('balanced', Diet::BALANCED);
    }

    /** @test */
    public function it_has_a_high_fiber_accessor()
    {
        $this->assertEquals('high-fiber', Diet::HIGH_FIBER);
    }

    /** @test */
    public function it_has_a_high_protein_accessor()
    {
        $this->assertEquals('high-protein', Diet::HIGH_PROTEIN);
    }

    /** @test */
    public function it_has_a_low_carb_accessor()
    {
        $this->assertEquals('low-carb', Diet::LOW_CARB);
    }

    /** @test */
    public function it_has_a_low_fat_accessor()
    {
        $this->assertEquals('low-fat', Diet::LOW_FAT);
    }

    /** @test */
    public function it_has_a_low_sodium_accessor()
    {
        $this->assertEquals('low-sodium', Diet::LOW_SODIUM);
    }
}
