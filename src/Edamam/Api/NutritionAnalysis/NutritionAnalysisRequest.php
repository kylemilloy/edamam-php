<?php

namespace Edamam\Api\NutritionAnalysis;

use Edamam\Api\Request;

class NutritionAnalysisRequest extends Request
{
    /**
     * Return the API Credentials.
     *
     * @return array
     */
    public static function getAuthenticationParameters(): array
    {
        return NutritionAnalysis::getApiCredentials();
    }
}
