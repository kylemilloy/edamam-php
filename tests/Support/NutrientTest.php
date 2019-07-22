<?php

namespace Tests\Support;

use Tests\TestCase;
use Edamam\Support\Nutrient;

class NutrientTest extends TestCase
{
    /** @test */
    public function it_has_a_calcium_accessor()
    {
        $this->assertEquals('CA', Nutrient::CALCIUM);
    }

    /** @test */
    public function it_has_a_calories_accessor()
    {
        $this->assertEquals('ENERC_KCAL', Nutrient::CALORIES);
    }

    /** @test */
    public function it_has_a_carbs_accessor()
    {
        $this->assertEquals('CHOCDF', Nutrient::CARBS);
    }

    /** @test */
    public function it_has_a_b3_accessor()
    {
        $this->assertEquals('NIA', Nutrient::VITAMIN_B3);
    }

    /** @test */
    public function it_has_a_cholesterol_accessor()
    {
        $this->assertEquals('CHOLE', Nutrient::CHOLESTEROL);
    }

    /** @test */
    public function it_has_a_phosphorus_accessor()
    {
        $this->assertEquals('P', Nutrient::PHOSPHORUS);
    }

    /** @test */
    public function it_has_a_monounsaturated_accessor()
    {
        $this->assertEquals('FAMS', Nutrient::MONOUNSATURATED_FAT);
    }

    /** @test */
    public function it_has_a_protein_accessor()
    {
        $this->assertEquals('PROCNT', Nutrient::PROTEIN);
    }

    /** @test */
    public function it_has_a_polyunsaturated_accessor()
    {
        $this->assertEquals('FAPU', Nutrient::POLYUNSATURATED_FAT);
    }

    /** @test */
    public function it_has_a_b2_accessor()
    {
        $this->assertEquals('RIBF', Nutrient::VITAMIN_B2);
    }

    /** @test */
    public function it_has_a_saturated_fat_accessor()
    {
        $this->assertEquals('FASAT', Nutrient::SATURATED_FAT);
    }

    /** @test */
    public function it_has_a_sugar_accessor()
    {
        $this->assertEquals('SUGAR', Nutrient::SUGAR);
    }

    /** @test */
    public function it_has_a_fat_accessor()
    {
        $this->assertEquals('FAT', Nutrient::FAT);
    }

    /** @test */
    public function it_has_a_b1_accessor()
    {
        $this->assertEquals('THIA', Nutrient::VITAMIN_B1);
    }

    /** @test */
    public function it_has_a_trans_fat_accessor()
    {
        $this->assertEquals('FATRN', Nutrient::TRANS_FAT);
    }

    /** @test */
    public function it_has_a_vit_e_accessor()
    {
        $this->assertEquals('TOCPHA', Nutrient::VITAMIN_E);
    }

    /** @test */
    public function it_has_a_iron_accessor()
    {
        $this->assertEquals('FE', Nutrient::IRON);
    }

    /** @test */
    public function it_has_a_vit_a_accessor()
    {
        $this->assertEquals('VITA_RAE', Nutrient::VITAMIN_A);
    }

    /** @test */
    public function it_has_a_fiber_accessor()
    {
        $this->assertEquals('FIBTG', Nutrient::FIBER);
    }

    /** @test */
    public function it_has_a_vit_b12_accessor()
    {
        $this->assertEquals('VITB12', Nutrient::VITAMIN_B12);
    }

    /** @test */
    public function it_has_a_folate_equiv_accessor()
    {
        $this->assertEquals('FOLDFE', Nutrient::VITAMIN_B9);
    }

    /** @test */
    public function it_has_a_vit_b6_accessor()
    {
        $this->assertEquals('VITB6A', Nutrient::VITAMIN_B6);
    }

    /** @test */
    public function it_has_a_potassium_accessor()
    {
        $this->assertEquals('K', Nutrient::POTASSIUM);
    }

    /** @test */
    public function it_has_a_vit_c_accessor()
    {
        $this->assertEquals('VITC', Nutrient::VITAMIN_C);
    }

    /** @test */
    public function it_has_a_magnesium_accessor()
    {
        $this->assertEquals('MG', Nutrient::MAGNESIUM);
    }

    /** @test */
    public function it_has_a_vit_d_accessor()
    {
        $this->assertEquals('VITD', Nutrient::VITAMIN_D);
    }

    /** @test */
    public function it_has_a_sodium_accessor()
    {
        $this->assertEquals('NA', Nutrient::SODIUM);
    }

    /** @test */
    public function it_has_a_vit_k_accessor()
    {
        $this->assertEquals('VITK1', Nutrient::VITAMIN_K);
    }
}
