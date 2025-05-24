# SVM API client

This is a complete implementation of the API of the [Sportclub Vrijwilligers Management](https://sportclubvrijwilligersmanagement.nl/) tool.

## Requirements

This package requires PHP 8.3 or higher.

## Installation

You can install the package via Composer:

```bash
composer require vdhicts/svm-api-client
```

## Usage

This package provides a fluent interface to the SVM API. Please refer to the [API documentation](https://api.sportclubvrijwilligersmanagement.nl/docs) for more information about the requests.

### Getting started

You can find your API key at the [SVM app](https://app.sportclubvrijwilligersmanagement.nl/association/api).

```php
use Vdhicts\SVM\SVMConnector;

$connector = new SVMConnector('API_KEY');

$teams = $connector
    ->teams()
    ->list();
```

### Handling errors

The API client will throw exceptions on errors.

### Laravel

This package can be easily used in any Laravel application:

```env
SVM_API_KEY=apikey
```

Next create a config file in `config/svm.php`:

```php
return [
    'api_key' => env('SVM_API_KEY'),
];
```

Then register your connector in the `register` method of the `AppServiceProvider`:

```php
$this->app->singleton(SVMConnector::class, fn () => new SVMConnector(config('svm.api_key')));
```

You can now inject the `SVMConnector` in your controllers or services and immediately start using it.

## Contributing

Found a bug or want to add a new feature? Great! There are also many other ways to make meaningful contributions such
as reviewing outstanding pull requests and writing documentation. Even opening an issue for a bug you found is
appreciated.

When you create a pull request, make sure it is tested, following the code standard (run `composer code-style:fix` to
take care of that for you) and please create one pull request per feature. In exchange, you will be credited as
contributor.

### Testing

To run the tests, you can use the following command:

```bash
composer test
```

This package offers basic tests to ensure some functionality of the API client and uses fixtures to mock the API 
responses.

### Security

If you discover any security related issues in this or other packages of Vdhicts, please email security@vdhicts.nl
instead of using the issue tracker.
