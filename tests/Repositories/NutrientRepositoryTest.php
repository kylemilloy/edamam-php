<?php

namespace Tests\Repositories;

use Tests\TestCase;
use Edamam\Repositories\NutrientRepository;

class NutrientRepositoryTest extends TestCase
{
    /** @test */
    public function it_can_get_the_calcium_value()
    {
        $repository = $this->createRepository('CA', $value = 1);
        $this->assertEquals($value, $repository->calcium());
    }

    /** @test */
    public function it_can_get_the_calories_value()
    {
        $repository = $this->createRepository('ENERC_KCAL', $value = 2);
        $this->assertEquals($value, $repository->calories());
    }

    /** @test */
    public function it_can_get_the_carbs_value()
    {
        $repository = $this->createRepository('CHOCDF', $value = 3);
        $this->assertEquals($value, $repository->carbs());
    }

    /** @test */
    public function it_can_get_the_b3_value()
    {
        $repository = $this->createRepository('NIA', $value = 4);
        $this->assertEquals($value, $repository->b3());
    }

    /** @test */
    public function it_can_get_the_cholesterol_value()
    {
        $repository = $this->createRepository('CHOLE', $value = 5);
        $this->assertEquals($value, $repository->cholesterol());
    }

    /** @test */
    public function it_can_get_the_phosphorus_value()
    {
        $repository = $this->createRepository('P', $value = 6);
        $this->assertEquals($value, $repository->phosphorus());
    }

    /** @test */
    public function it_can_get_the_monounsaturated_value()
    {
        $repository = $this->createRepository('FAMS', $value = 7);
        $this->assertEquals($value, $repository->monounsaturated());
    }

    /** @test */
    public function it_can_get_the_protein_value()
    {
        $repository = $this->createRepository('PROCNT', $value = 8);
        $this->assertEquals($value, $repository->protein());
    }

    /** @test */
    public function it_can_get_the_polyunsaturated_value()
    {
        $repository = $this->createRepository('FAPU', $value = 9);
        $this->assertEquals($value, $repository->polyunsaturated());
    }

    /** @test */
    public function it_can_get_the_b2_value()
    {
        $repository = $this->createRepository('RIBF', $value = 10);
        $this->assertEquals($value, $repository->b2());
    }

    /** @test */
    public function it_can_get_the_sugar_value()
    {
        $repository = $this->createRepository('SUGAR', $value = 11);
        $this->assertEquals($value, $repository->sugar());
    }

    /** @test */
    public function it_can_get_the_sugarAdded_value()
    {
        $repository = $this->createRepository('SUGAR.added', $value = 12);
        $this->assertEquals($value, $repository->sugarAdded());
    }

    /** @test */
    public function it_can_get_the_fat_value()
    {
        $repository = $this->createRepository('FAT', $value = 13);
        $this->assertEquals($value, $repository->fat());
    }

    /** @test */
    public function it_can_get_the_saturated_value()
    {
        $repository = $this->createRepository('FASAT', $value = 14);
        $this->assertEquals($value, $repository->saturated());
    }

    /** @test */
    public function it_can_get_the_trans_value()
    {
        $repository = $this->createRepository('FATRN', $value = 15);
        $this->assertEquals($value, $repository->trans());
    }

    /** @test */
    public function it_can_get_the_e_value()
    {
        $repository = $this->createRepository('TOCPHA', $value = 16);
        $this->assertEquals($value, $repository->e());
    }

    /** @test */
    public function it_can_get_the_iron_value()
    {
        $repository = $this->createRepository('FE', $value = 17);
        $this->assertEquals($value, $repository->iron());
    }

    /** @test */
    public function it_can_get_the_vit_a_value()
    {
        $repository = $this->createRepository('VITA_RAE', $value = 18);
        $this->assertEquals($value, $repository->a());
    }

    /** @test */
    public function it_can_get_the_fiber_value()
    {
        $repository = $this->createRepository('FIBTG', $value = 19);
        $this->assertEquals($value, $repository->fiber());
    }

    /** @test */
    public function it_can_get_the_b12_value()
    {
        $repository = $this->createRepository('VITB12', $value = 20);
        $this->assertEquals($value, $repository->b12());
    }

    /** @test */
    public function it_can_get_the_b9_value()
    {
        $repository = $this->createRepository('FOLDFE', $value = 21);
        $this->assertEquals($value, $repository->b9());
    }

    /** @test */
    public function it_can_get_the_potassium_value()
    {
        $repository = $this->createRepository('K', $value = 22);
        $this->assertEquals($value, $repository->potassium());
    }

    /** @test */
    public function it_can_get_the_c_value()
    {
        $repository = $this->createRepository('VITC', $value = 23);
        $this->assertEquals($value, $repository->c());
    }

    /** @test */
    public function it_can_get_the_magnesium_value()
    {
        $repository = $this->createRepository('MG', $value = 24);
        $this->assertEquals($value, $repository->magnesium());
    }

    /** @test */
    public function it_can_get_the_vit_d_value()
    {
        $repository = $this->createRepository('VITD', $value = 25);
        $this->assertEquals($value, $repository->d());
    }

    /** @test */
    public function it_can_get_the_sodium_value()
    {
        $repository = $this->createRepository('NA', $value = 26);
        $this->assertEquals($value, $repository->sodium());
    }

    /** @test */
    public function it_can_get_the_vit_k_value()
    {
        $repository = $this->createRepository('VITK1', $value = 27);
        $this->assertEquals($value, $repository->k());
    }

    /** @test */
    public function it_can_get_the_b6_value()
    {
        $repository = $this->createRepository('VITB6A', $value = 28);
        $this->assertEquals($value, $repository->b6());
    }

    /** @test */
    public function it_can_get_the_vit_b1_value()
    {
        $repository = $this->createRepository('THIA', $value = 29);
        $this->assertEquals($value, $repository->b1());
    }

    /** @test */
    public function it_can_get_the_zinc_value()
    {
        $repository = $this->createRepository('ZN', $value = 30);
        $this->assertEquals($value, $repository->zinc());
    }

    /**
     * Create a repo for testing.
     *
     * @param string $key
     * @param float  $value
     *
     * @return \Edamam\Repositories\NutrientRepository
     */
    protected function createRepository(string $key, float $value)
    {
        return NutrientRepository::create([$key => $value]);
    }
}
