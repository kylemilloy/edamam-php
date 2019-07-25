# FoodDatabase API

This API provides you with tools to find nutrition and diet data for generic foods, packaged foods and restaurant meals. In addition it employs NLP (Natural Language Processing) which allows for extraction of food entities from unstructured text.

## FoodRequest

Food requests are made by with the `\Edamam\Api\FoodRequest` class. You must set either an ingredient or a upc barcode to make a valid request.

### Creating requests

You can instantiate the class through either its constructor or via the `create` static method

```php
new FoodRequest();
FoodRequest::create();
```

### Setting request parameters

The following are the query parameters that you are allowed to be set.

```php
/**
 * The allowed parameters to assign.
 *
 * @var array
    */
protected $allowedQueryParameters = [
    'upc',
    'page',
    'calories',
    'category',
    'ingredient',
    'healthLabel',
    'categoryLabel',
    'nutritionType',
    'maximumCalories',
    'minimumCalories',
];
```

These parameters can be mass-assigned when instantiating the class through either its constructor or the `create` static method:

```php
new FoodRequest(['ingredient' => 'pizza']);

// or

FoodRequest::create(['ingredient' => 'pizza']);
```

You may also add parameters through helper methods after instantiating the class. There are helper methods for each parameter in the `$allowedQueryParameters` array. When a value is set the helper methods return the `FoodRequest` instance so you can link multiple set methods. You can access them like so:

```php
FoodRequest::create()
    ->ingredient('beer')
    ->healthLabel(Health::ALCOHOL_FREE)
    ->maximumCalories(100);
```

You can also get the parameters that have been set by not passing an argument to these methods

```php
$request = FoodRequest::create(['ingredient' => 'beer']);

$request->ingredient(); // returns 'beer'
```

You can send the request using the `fetch` method. The fetch method returns an instance of the `FoodRequest` instance if you need to continue using the class, otherwise you can use the `response` method to access the `FoodResponse` directly. You can also use the `find` static method to immediately initiate a request.

```php
$request = FoodRequest::create(['ingredient' => 'beer']);
$request->fetch();

FoodRequest::create(['ingredient' => 'beer'])
    ->response();

FoodRequest::find(['ingredient' => 'beer']);
```

After sending a request the response will be cached in memory. If you need to use the same instance to send another request you need to invalidate the cached response with the `fresh` method:

```php
$request = FoodRequest::create(['ingredient' => 'beer']);

$request->fetch();
$request->ingredient('pizza')
    ->fresh()
    ->fetch();
```

### Handling responses

After a `FoodRequest` is successfully sent the class instantiates a `FoodResponse` class. This class grants access to the raw Guzzle response if you need to parse it manually though the `raw` method. It also saves the response's raw body which is accessible via the `data` method. Finally it also parses and organizes the response into the `results` method which gets wrapped in a `Collection` helper instance (documentation available [here](https://github.com/tightenco/collect)).

```php
$response = FoodRequest::find(['ingredient' => 'beer'])

$response->raw();

$response->data();

$response->results();
```

### Handling results

The results returned by the `FoodResponse` are wrapped in a `Collection` instance which allows you take advantage of a few helper functions. The first result in the collection is the best match and is easily accessible using the collections `first` method:

```php
$results = FoodRequest::find(['ingredient' => 'beer'])
    ->results();

$results->first();
```

Each collection item is wrapped within a `Food` model class and exposes the following parameters:

```php
/**
 * The values that are assignable.
 *
 * @var array
    */
protected $allowed = [
    'uri',
    'brand',
    'image',
    'label',
    'foodId',
    'category',
    'nutrients',
    'measurements',
    'categoryLabel',
];
```

You can access these parameters individually or en masse to json or to an array with the `toJson` and `toArray` functions:

```php
$results = FoodRequest::find(['ingredient' => 'beer'])
    ->results();

$results->label;

$results->toJson();
$results->toArray();
```

The nutrients keys are merged into a `NutrientsRepository` which allows for ease of access of the various food item's nutritional content. There are up to 30 different nutrional items you can access. You can access them with the `get` method or via the several helper methods avaialble for each nutrient.

```php
use \Edamam\Support\Nutrient;

$beer = FoodRequest::find(['ingredient' => 'beer'])
    ->results()
    ->first();

$beer->nutrients->calores();
$beer->nutrients->get(Nutrient::CALORIES);
$beer->nutrients->get('ENERC_KCAL');
```
