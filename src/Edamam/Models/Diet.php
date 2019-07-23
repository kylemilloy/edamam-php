<?php

namespace Edamam\Models;

class Diet extends Model
{
    /**
     *  Protein/Fat/Carb values in 15/35/50 ratio.
     *
     * @return string
     */
    const BALANCED = 'balanced';

    /**
     * More than 5g fiber per serving.
     *
     * @return string
     */
    const HIGH_FIBER = 'high-fiber';

    /**
     * More than 50% of total calories from proteins.
     *
     * @return string
     */
    const HIGH_PROTEIN = 'high-protein';

    /**
     *  Less than 20% of total calories from carbs.
     *
     * @return string
     */
    const LOW_CARB = 'low-carb';

    /**
     *  Less than 15% of total calories from fat.
     *
     * @return string
     */
    const LOW_FAT = 'low-fat';

    /**
     * Less than 140mg Na per serving.
     *
     * @return string
     */
    const LOW_SODIUM = 'low-sodium';
}
