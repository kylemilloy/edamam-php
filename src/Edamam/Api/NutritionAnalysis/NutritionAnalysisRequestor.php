<?php

namespace Edamam\Api\NutritionAnalysis;

use Edamam\Abstracts\RequestAbstract;

abstract class NutritionAnalysisRequestor extends RequestAbstract
{
    public static function getApiCredentials(): array
    {
        return NutritionAnalysis::getApiCredentials();
    }
}
