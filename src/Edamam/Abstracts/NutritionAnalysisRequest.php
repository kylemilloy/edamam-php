<?php

namespace Edamam\Abstracts;

use Edamam\Api\NutritionAnalysis\NutritionAnalysis;

abstract class NutritionAnalysisRequest extends RequestAbstract
{
    public static function getApiCredentials(): array
    {
        return NutritionAnalysis::getApiCredentials();
    }
}
