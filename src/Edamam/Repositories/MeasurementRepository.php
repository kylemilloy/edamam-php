<?php

namespace Edamam\Repositories;

use Edamam\Support\Measurement;

class MeasurementRepository extends Repository
{
    /**
     * Get the  value.
     *
     * @return Measurement
     */
    public function gram()
    {
        return $this->get(Measurement::GRAM);
    }
}