<?php

namespace Edamam\Models;

class Food extends Model
{
    /**
     * The values that are mass-assignable.
     *
     * @var array
     */
    protected $allowed = [
        'id',
        'brand',
        'label',
        'category',
        'nutrients',
        'measurement',
        'categoryLabel',
    ];

    /**
     * The instance's ID.
     *
     * @var string
     */
    protected $id;

    /**
     * Food's brand, if applicable.
     *
     * @var string
     */
    protected $brand;

    /**
     * The instance's human readable label.
     *
     * @var string
     */
    protected $label;

    /**
     * The instance's source.
     *
     * @var string
     */
    protected $source;

    /**
     * Category as: generic, generic meal, packaged food, fast food, etc.
     *
     * @var string
     */
    protected $category;

    /**
     * The instance's nutrients.
     *
     * @var \Edamam\Models\Nutrient[]
     */
    protected $nutrients;

    /**
     * The instance's measurements.
     *
     * @var \Edamam\Models\Measurement
     */
    protected $measurement;

    /**
     * Item type as food or meal.
     *
     * @var string
     */
    protected $categoryLabel;

    /**
     * Get the id attribute.
     *
     * @return string
     */
    public function getIdAttribute(): string
    {
        return $this->id;
    }

    /**
     * Get the brand attribute.
     *
     * @return string
     */
    public function getBrandAttribute(): string
    {
        return $this->brand;
    }

    /**
     * Get the label attribute.
     *
     * @return string
     */
    public function getLabelAttribute(): string
    {
        return $this->label;
    }

    /**
     * Get the category attribute.
     *
     * @return string
     */
    public function getCategoryAttribute(): string
    {
        return $this->category;
    }

    /**
     * Get the nutrients array attribute.
     *
     * @return array
     */
    public function getNutrientsAttribute(): array
    {
        return $this->nutrients;
    }

    /**
     * Set the nutrients array attribute.
     *
     * @param array $nutrients
     */
    public function setNutrientsAttribute(array $nutrients): void
    {
        $this->nutrients = array_map(function ($nutrient) {
            return Nutrient::create($nutrient);
        }, $nutrients);
    }

    /**
     * Get the measurement attribute.
     *
     * @return \Edamam\Models\Measurement|null
     */
    public function getMeasurementAttribute(): ?Measurement
    {
        return $this->measurement;
    }

    /**
     * Create and set the measurement.
     *
     * @param array $measurement
     */
    public function setMeasurementAttribute(array $measurement): void
    {
        $this->measurement = Measurement::create($measurement);
    }

    /**
     * Get the category label.
     *
     * @return string
     */
    public function getCategoryLabelAttribute(): string
    {
        return $this->categoryLabel;
    }
}
