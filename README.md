# Edamam-PHP

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://travis-ci.org/kylemilloy/edamam-php.svg?branch=master)](https://travis-ci.org/itsnubix/nowcal)
[![StyleCI](https://github.styleci.io/repos/198011394/shield?branch=master)](https://github.styleci.io/repos/169808234)
[![Total Downloads](https://img.shields.io/packagist/dt/kylemilloy/edamam-php.svg?style=flat-square)](https://packagist.org/packages/itsnubix/nowcal)

A PHP library for interfacing with the [Edamam API](https://www.edamam.com/).

## Installation

Install with composer using `composer require kylemilloy/edamam-php`

## Basic usage

```php
use Edamam\Api\FoodDatabase\Food;

// Set the API credentials
Food::setApiCredentials('app_id', 'app_key');

// make a request to the food api
$json = Food::instance()
    ->ingredient('pizza')
    ->results();
```

## Edamam

The Edamam class controls the API credentials for all three API instances (Food, Recipes and Nutrition).

## Food

The Food class controls access to the Edamam Food API. You can view the documentation [here](https://developer.edamam.com/food-database-api-docs).

| Method             | Description                                                                           |
| ------------------ | ------------------------------------------------------------------------------------- |
| ingredient         | Get/set the ingredient, only ingredient OR UPC can be set, not both, but at least one |
| upc                | Get/set the upc, only ingredient or UPC can be set, not both, but at least one        |
| nutritionType      | Get/set the nutritionType                                                             |
| enableFoodLogging  | Sets nutrition-type to "logging"                                                      |
| disableFoodLogging | Sets nutrition-type to null                                                           |
| calories           | Get/set the calories, takes either one or two integers or an array as arguments       |
| minimumCalories    | Get/set the minimum calories                                                          |
| maximumCalories    | Get/set the maximum calories                                                          |
| category           | Get/set the category                                                                  |
| categoryLabel      | Get/set the categoryLabel                                                             |
| find               | Execute the API request and return the JSON data                                      |

Examples:

```php
use Edamam\Edamam;
use Edamam\Api\FoodDatabase\Food;

Food::instance()
    ->ingredient('beer') // or ->upc('012345678901')
    ->enableFoodLogging()
    ->disableFoodLogging()
    ->nutritionType('logging')
    ->calories(300) // sets the min to 300
    ->calories(null, 1000) // ALTERNATIVE syntax, sets the max to 1000
    ->calories(300, 1000) // ALTERNATIVE syntax,sets the calorie to 300-1000
    ->calories([ // ALTERNATIVE syntax, sets the calorie range to 300-1000
        'maximum' => 1000,
        'minimum' => 300,
    ])
    ->calories([ // ALTERNATIVE syntax, sets the calorie range to 300-1000
        300,
        1000
    ])
    ->minimumCalories(300) // ALTERNATIVE syntax, sets the min to 300
    ->maximumCalories(1000) // ALTERNATIVE syntax, sets the max to 1000
    ->category('generic-foods')
    ->categoryLabel('food')
    ->results(); // execute api search
```

## Todo

- ~~Add support for Food API~~
- Add support for Nutrition API
- Add support for Recipe API
