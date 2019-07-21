<?php

namespace Edamam\Support;

class Health
{
    /**
     * No alcohol used or contained.
     *
     * @return string
     */
    const ALCOHOL_FREE = 'alcohol-free';

    /**
     * does not contain celery or derivatives.
     *
     * @return string
     */
    const CELERY_FREE = 'celery-free';

    /**
     * does not contain crustaceans (shrimp, lobster etc.) or derivatives.
     *
     * @return string
     */
    const CRUSTACEAN_FREE = 'crustacean-free';

    /**
     * No dairy; no lactose.
     *
     * @return string
     */
    const DAIRY_FREE = 'dairy-free';

    /**
     * No eggs or products containing eggs.
     *
     * @return string
     */
    const EGG_FREE = 'egg-free';

    /**
     * No fish or fish derivatives.
     *
     * @return string
     */
    const FISH_FREE = 'fish-free';

    /**
     * No ingredients containing gluten.
     *
     * @return string
     */
    const GLUTEN_FREE = 'gluten-free';

    /**
     * Maximum 7 grams of net carbs per serving.
     *
     * @return string
     */
    const KETO = 'keto-friendly';

    /**
     * per serving – phosphorus less than 250 mg AND potassium less than
     * 500 mg AND sodium: less than 500 mg.
     *
     * @return string
     */
    const KIDNEY_FRIENDLY = 'kidney-friendly';

    /**
     * contains only ingredients allowed by the kosher diet. However it
     * does not guarantee kosher preparation of the ingredients
     * themselves.
     *
     * @return string
     */
    const KOSHER = 'kosher';

    /**
     * Less than 150mg per serving.
     *
     * @return string
     */
    const LOW_POTASSIUM = 'low-potassium';

    /**
     * does not contain lupine or derivatives.
     *
     * @return string
     */
    const LUPINE_FREE = 'lupine-free';

    /**
     * does not contain mustard or derivatives.
     *
     * @return string
     */
    const MUSTARD_FREE = 'mustard-free';

    /**
     * No oil added except to what is contained in the basic ingredients.
     *
     * @return string
     */
    const OIL_FREE = 'No-oil-added';

    /**
     * No simple sugars – glucose, dextrose, galactose, fructose, sucrose,
     * lactose, maltose.
     *
     * @return string
     */
    const SUGAR_FREE = 'low-sugar';

    /**
     * Excludes what are perceived to be agricultural products; grains, legumes,
     * dairy products, potatoes, refined salt, refined sugar, and processed oils.
     *
     * @return string
     */
    const PALEO = 'paleo';

    /**
     * No peanuts or products containing peanuts.
     *
     * @return string
     */
    const PEANUT_FREE = 'peanut-free';

    /**
     * Does not contain meat or meat based products, can contain dairy and fish.
     *
     * @return string
     */
    const PESCATARIAN = 'pescatarian';

    /**
     * does not contain pork or derivatives.
     *
     * @return string
     */
    const PORK_FREE = 'pork-free';

    /**
     * does not contain beef, lamb, pork, duck, goose, game, horse, and other
     * types of red meat or products containing red meat.
     *
     * @return string
     */
    const RED_MEAT_FREE = 'red-meat-free';

    /**
     * does not contain sesame seed or derivatives.
     *
     * @return string
     */
    const SESAME_FREE = 'sesame-free';

    /**
     * No shellfish or shellfish derivatives.
     *
     * @return string
     */
    const SHELLFISH_FREE = 'shellfish-free';

    /**
     * No soy or products containing soy.
     *
     * @return string
     */
    const SOY_FREE = 'soy-free';

    /**
     * Less than 4g of sugar per serving.
     *
     * @return string
     */
    const LOW_SUGAR = 'sugar-conscious';

    /**
     * No tree nuts or products containing tree nuts.
     *
     * @return string
     */
    const TREE_NUT_FREE = 'tree-nut-free';

    /**
     * No meat, poultry, fish, dairy, eggs or honey.
     *
     * @return string
     */
    const VEGAN = 'vegan';

    /**
     * No meat, poultry, or fish.
     *
     * @return string
     */
    const VEGETARIAN = 'vegetarian';

    /**
     * No wheat, can have gluten though.
     *
     * @return string
     */
    const WHEAT_FREE = 'wheat-free';
}
