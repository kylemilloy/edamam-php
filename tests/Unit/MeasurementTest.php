<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Models\Measurement;

class MeasurementTest extends TestCase
{
    protected function getOntology(string $measure)
    {
        return 'http://www.edamam.com/ontologies/edamam.owl#Measure_'.$measure;
    }

    /** @test */
    public function it_has_a_gram_accessor()
    {
        $this->assertEquals(
            $this->getOntology('gram'),
            Measurement::GRAM
        );
    }

    /** @test */
    public function it_has_a_kilogram_accessor()
    {
        $this->assertEquals(
            $this->getOntology('kilogram'),
            Measurement::KILOGRAM
        );
    }

    /** @test */
    public function it_has_a_millilitre_accessor()
    {
        $this->assertEquals(
            $this->getOntology('milliliter'),
            Measurement::MILLILITER
        );
    }

    /** @test */
    public function it_has_a_litre_accessor()
    {
        $this->assertEquals(
            $this->getOntology('liter'),
            Measurement::LITER
        );
    }

    /** @test */
    public function it_has_a_pinch_accessor()
    {
        $this->assertEquals(
            $this->getOntology('pinch'),
            Measurement::PINCH
        );
    }

    /** @test */
    public function it_has_a_ounce_accessor()
    {
        $this->assertEquals(
            $this->getOntology('ounce'),
            Measurement::OUNCE
        );
    }

    /** @test */
    public function it_has_a_pound_accessor()
    {
        $this->assertEquals(
            $this->getOntology('pound'),
            Measurement::POUND
        );
    }

    /** @test */
    public function it_has_a_drop_accessor()
    {
        $this->assertEquals(
            $this->getOntology('drop'),
            Measurement::DROP
        );
    }

    /** @test */
    public function it_has_a_teaspoon_accessor()
    {
        $this->assertEquals(
            $this->getOntology('teaspoon'),
            Measurement::TEASPOON
        );
    }

    /** @test */
    public function it_has_a_tablespoon_accessor()
    {
        $this->assertEquals(
            $this->getOntology('tablespoon'),
            Measurement::TABLESPOON
        );
    }

    /** @test */
    public function it_has_a_fluid_ounce_accessor()
    {
        $this->assertEquals(
            $this->getOntology('fluid_ounce'),
            Measurement::FLUID_OUNCE
        );
    }

    /** @test */
    public function it_has_a_cup_accessor()
    {
        $this->assertEquals(
            $this->getOntology('cup'),
            Measurement::CUP
        );
    }

    /** @test */
    public function it_has_a_pint_accessor()
    {
        $this->assertEquals(
            $this->getOntology('pint'),
            Measurement::PINT
        );
    }

    /** @test */
    public function it_has_a_quart_accessor()
    {
        $this->assertEquals(
            $this->getOntology('quart'),
            Measurement::QUART
        );
    }

    /** @test */
    public function it_has_a_gallon_accessor()
    {
        $this->assertEquals(
            $this->getOntology('gallon'),
            Measurement::GALLON
        );
    }
}
