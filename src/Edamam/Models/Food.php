<?php

namespace Edamam\Models;

use Edamam\Repositories\NutrientRepository;

class Food extends Model
{
    /**
     * The values that are assignable.
     *
     * @var array
     */
    protected $allowed = [
        'uri',
        'brand',
        'image',
        'label',
        'foodId',
        'category',
        'nutrients',
        'categoryLabel',
    ];

    /**
     * Food's uri, if applicable.
     *
     * @var string
     */
    public $uri;

    /**
     * Food's brand, if applicable.
     *
     * @var string
     */
    public $brand;

    /**
     * The instance's human readable label.
     *
     * @var string
     */
    public $label;

    /**
     * The instance's image url.
     *
     * @var string
     */
    public $image;

    /**
     * The instance's ID.
     *
     * @var string
     */
    public $foodId;

    /**
     * The instance's source.
     *
     * @var string
     */
    public $source;

    /**
     * Category as: generic, generic meal, packaged food, fast food, etc.
     *
     * @var string
     */
    public $category;

    /**
     * The instance's nutrients.
     *
     * @var \Edamam\Repositories\NutrientRepository
     */
    public $nutrients;

    /**
     * Item type as food or meal.
     *
     * @var string
     */
    public $categoryLabel;

    /**
     * Set the nutrients array attribute.
     *
     * @param array $nutrients
     */
    public function setNutrientsAttribute(array $nutrients)
    {
        return NutrientRepository::create($nutrients);
    }
}
