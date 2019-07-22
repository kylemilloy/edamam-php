<?php

namespace Edamam\Requests\NutritionAnalysis;

use Edamam\Abstracts\RequestorAbstract;

abstract class NutritionAnalysisRequestor extends RequestorAbstract
{
    public static function getApiCredentials(): array
    {
        return NutritionAnalysis::getApiCredentials();
    }
}
