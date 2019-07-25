<?php

namespace Tests\Repositories;

use PHPUnit\Framework\TestCase;
use Edamam\Repositories\MeasurementRepository;

class MeasurementRepositoryTest extends TestCase
{
    protected function createRepository($key, $value)
    {
        return MeasurementRepository::create([$key => $value]);
    }
}
