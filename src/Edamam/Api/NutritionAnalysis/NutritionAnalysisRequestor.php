<?php

namespace Edamam\Api\NutritionAnalysis;

use Edamam\Abstracts\RequestorAbstract;

class NutritionAnalysisRequestor extends RequestorAbstract
{
    public static function getApiCredentials(): array
    {
        return NutritionAnalysis::getApiCredentials();
    }
}
