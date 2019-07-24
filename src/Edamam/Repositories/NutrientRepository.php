<?php

namespace Edamam\Repositories;

use Edamam\Models\Nutrient;

class NutrientRepository extends Repository
{
    /**
     * Get the calories value.
     *
     * @return float|null
     */
    public function calories(): ?float
    {
        return $this->get(Nutrient::CALORIES);
    }

    /**
     * Get the fiber values.
     *
     * @return float|null
     */
    public function fiber(): ?float
    {
        return $this->get(Nutrient::FIBER);
    }

    /**
     * Get the carbs values.
     *
     * @return float|null
     */
    public function carbs(): ?float
    {
        return $this->get(Nutrient::CARBS);
    }

    /**
     * Get the sugar values.
     *
     * @return float|null
     */
    public function sugar(): ?float
    {
        return $this->get(Nutrient::SUGAR);
    }

    /**
     * Get the sugarAdded values.
     *
     * @return float|null
     */
    public function sugarAdded(): ?float
    {
        return $this->get(Nutrient::SUGAR_ADDED);
    }

    /**
     * Get the protein values.
     *
     * @return float|null
     */
    public function protein(): ?float
    {
        return $this->get(Nutrient::PROTEIN);
    }

    /**
     * Get the cholesterol values.
     *
     * @return float|null
     */
    public function cholesterol(): ?float
    {
        return $this->get(Nutrient::CHOLESTEROL);
    }

    /**
     * Get the fat values.
     *
     * @return float|null
     */
    public function fat(): ?float
    {
        return $this->get(Nutrient::FAT);
    }

    /**
     * Get the saturated values.
     *
     * @return float|null
     */
    public function saturated(): ?float
    {
        return $this->get(Nutrient::SATURATED_FAT);
    }

    /**
     * Get the trans fat values.
     *
     * @return float|null
     */
    public function trans(): ?float
    {
        return $this->get(Nutrient::TRANS_FAT);
    }

    /**
     * Get the monounsaturated values.
     *
     * @return float|null
     */
    public function monounsaturated(): ?float
    {
        return $this->get(Nutrient::MONOUNSATURATED_FAT);
    }

    /**
     * Get the polyunsaturated values.
     *
     * @return float|null
     */
    public function polyunsaturated(): ?float
    {
        return $this->get(Nutrient::POLYUNSATURATED_FAT);
    }

    /**
     * Get the vitamin a values.
     *
     * @return float|null
     */
    public function a(): ?float
    {
        return $this->get(Nutrient::VITAMIN_A);
    }

    /**
     * Get the vitamin b2 values.
     *
     * @return float|null
     */
    public function b1(): ?float
    {
        return $this->get(Nutrient::VITAMIN_B1);
    }

    /**
     * Get the vitamin b2 values.
     *
     * @return float|null
     */
    public function b2(): ?float
    {
        return $this->get(Nutrient::VITAMIN_B2);
    }

    /**
     * Get the vitamin b3 values.
     *
     * @return float|null
     */
    public function b3(): ?float
    {
        return $this->get(Nutrient::VITAMIN_B3);
    }

    /**
     * Get the vitamin b6 values.
     *
     * @return float|null
     */
    public function b6(): ?float
    {
        return $this->get(Nutrient::VITAMIN_B6);
    }

    /**
     * Get the vitamin b9 values.
     *
     * @return float|null
     */
    public function b9(): ?float
    {
        return $this->get(Nutrient::VITAMIN_B9);
    }

    /**
     * Get the vitamin b12 values.
     *
     * @return float|null
     */
    public function b12(): ?float
    {
        return $this->get(Nutrient::VITAMIN_B12);
    }

    /**
     * Get the vitamin c values.
     *
     * @return float|null
     */
    public function c(): ?float
    {
        return $this->get(Nutrient::VITAMIN_C);
    }

    /**
     * Get the vitamin d values.
     *
     * @return float|null
     */
    public function d(): ?float
    {
        return $this->get(Nutrient::VITAMIN_D);
    }

    /**
     * Get the vitamin e values.
     *
     * @return float|null
     */
    public function e(): ?float
    {
        return $this->get(Nutrient::VITAMIN_E);
    }

    /**
     * Get the vitamin k values.
     *
     * @return float|null
     */
    public function k(): ?float
    {
        return $this->get(Nutrient::VITAMIN_K);
    }

    /**
     * Get the calcium value.
     *
     * @return float|null
     */
    public function calcium(): ?float
    {
        return $this->get(Nutrient::CALCIUM);
    }

    /**
     * Get the iron value.
     *
     * @return float|null
     */
    public function iron(): ?float
    {
        return $this->get(Nutrient::IRON);
    }

    /**
     * Get the phosphorus values.
     *
     * @return float|null
     */
    public function phosphorus(): ?float
    {
        return $this->get(Nutrient::PHOSPHORUS);
    }

    /**
     * Get the sodium values.
     *
     * @return float|null
     */
    public function sodium(): ?float
    {
        return $this->get(Nutrient::SODIUM);
    }

    /**
     * Get the phosphorus values.
     *
     * @return float|null
     */
    public function potassium(): ?float
    {
        return $this->get(Nutrient::POTASSIUM);
    }

    /**
     * Get the magnesium values.
     *
     * @return float|null
     */
    public function magnesium(): ?float
    {
        return $this->get(Nutrient::MAGNESIUM);
    }

    /**
     * Get the zinc values.
     *
     * @return float|null
     */
    public function zinc(): ?float
    {
        return $this->get(Nutrient::ZINC);
    }
}
