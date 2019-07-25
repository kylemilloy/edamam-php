# Edamam-PHP

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://travis-ci.org/kylemilloy/edamam-php.svg?branch=master)](https://travis-ci.org/kylemilloy/edamam-php)
[![StyleCI](https://github.styleci.io/repos/198011394/shield?branch=master)](https://github.styleci.io/repos/198011394)
[![Total Downloads](https://img.shields.io/packagist/dt/kylemilloy/edamam-php.svg?style=flat-square)](https://packagist.org/packages/kylemilloy/edamam-php)

The Edama-PHP library provides access to the [Edamam API](https://developer.edamam.com/) for the PHP language.

## Installation

Install with composer using `composer require kylemilloy/edamam-php`

## Usage

Simple usage looks like:

```php
\Edamam\Api\FoodDatabase\FoodDatabase::setApiCredentials('app_id', 'app_key');

$results = \Edamam\Api\FoodDatabase\FoodRequest::find(['ingredient' => 'pizza'])->results();
```

For more complex usage view the [FoodDatabase API Docs](docs/FOODDATABASE.md).

## Todo

- Add full support for Food Database API
- Add full support for Nutrition Analysis API
- Add full support for Recipe Search API
