<?php

namespace Tests\Unit;

use Tests\TestCase;
use Edamam\Support\Health;

class HealthTest extends TestCase
{
    /** @test */
    public function it_has_a_alcohol_free_accessor()
    {
        $this->assertEquals('alcohol-free', Health::ALCOHOL_FREE);
    }

    /** @test */
    public function it_has_a_celery_free_accessor()
    {
        $this->assertEquals('celery-free', Health::CELERY_FREE);
    }

    /** @test */
    public function it_has_a_crustacean_free_accessor()
    {
        $this->assertEquals('crustacean-free', Health::CRUSTACEAN_FREE);
    }

    /** @test */
    public function it_has_a_dairy_free_accessor()
    {
        $this->assertEquals('dairy-free', Health::DAIRY_FREE);
    }

    /** @test */
    public function it_has_a_egg_free_accessor()
    {
        $this->assertEquals('egg-free', Health::EGG_FREE);
    }

    /** @test */
    public function it_has_a_fish_free_accessor()
    {
        $this->assertEquals('fish-free', Health::FISH_FREE);
    }

    /** @test */
    public function it_has_a_gluten_free_accessor()
    {
        $this->assertEquals('gluten-free', Health::GLUTEN_FREE);
    }

    /** @test */
    public function it_has_a_keto_accessor()
    {
        $this->assertEquals('keto-friendly', Health::KETO);
    }

    /** @test */
    public function it_has_a_kidney_friendly_accessor()
    {
        $this->assertEquals('kidney-friendly', Health::KIDNEY_FRIENDLY);
    }

    /** @test */
    public function it_has_a_kosher_accessor()
    {
        $this->assertEquals('kosher', Health::KOSHER);
    }

    /** @test */
    public function it_has_a_low_potassium_accessor()
    {
        $this->assertEquals('low-potassium', Health::LOW_POTASSIUM);
    }

    /** @test */
    public function it_has_a_lupine_free_accessor()
    {
        $this->assertEquals('lupine-free', Health::LUPINE_FREE);
    }

    /** @test */
    public function it_has_a_mustard_free_accessor()
    {
        $this->assertEquals('mustard-free', Health::MUSTARD_FREE);
    }

    /** @test */
    public function it_has_a_oil_free_accessor()
    {
        $this->assertEquals('no-oil-added', Health::OIL_FREE);
    }

    /** @test */
    public function it_has_a_sugar_free_accessor()
    {
        $this->assertEquals('low-sugar', Health::SUGAR_FREE);
    }

    /** @test */
    public function it_has_a_paleo_accessor()
    {
        $this->assertEquals('paleo', Health::PALEO);
    }

    /** @test */
    public function it_has_a_peanut_free_accessor()
    {
        $this->assertEquals('peanut-free', Health::PEANUT_FREE);
    }

    /** @test */
    public function it_has_a_pescatarian_accessor()
    {
        $this->assertEquals('pescatarian', Health::PESCATARIAN);
    }

    /** @test */
    public function it_has_a_pork_free_accessor()
    {
        $this->assertEquals('pork-free', Health::PORK_FREE);
    }

    /** @test */
    public function it_has_a_read_meat_free_accessor()
    {
        $this->assertEquals('red-meat-free', Health::RED_MEAT_FREE);
    }

    /** @test */
    public function it_has_a_sesame_free_accessor()
    {
        $this->assertEquals('sesame-free', Health::SESAME_FREE);
    }

    /** @test */
    public function it_has_a_shellfish_free_accessor()
    {
        $this->assertEquals('shellfish-free', Health::SHELLFISH_FREE);
    }

    /** @test */
    public function it_has_a_soy_free_accessor()
    {
        $this->assertEquals('soy-free', Health::SOY_FREE);
    }

    /** @test */
    public function it_has_a_low_sugar_accessor()
    {
        $this->assertEquals('sugar-conscious', Health::LOW_SUGAR);
    }

    /** @test */
    public function it_has_a_treenut_free_accessor()
    {
        $this->assertEquals('tree-nut-free', Health::TREE_NUT_FREE);
    }

    /** @test */
    public function it_has_a_vegan_accessor()
    {
        $this->assertEquals('vegan', Health::VEGAN);
    }

    /** @test */
    public function it_has_a_vegetarian_accessor()
    {
        $this->assertEquals('vegetarian', Health::VEGETARIAN);
    }

    /** @test */
    public function it_has_a_wheat_free_accessor()
    {
        $this->assertEquals('wheat-free', Health::WHEAT_FREE);
    }
}
