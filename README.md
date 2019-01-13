# JsonApiRequest

Json Api Request uses the php Client URL Library.

## Using Json Api Request

Json Api Request uses the php Client URL Library.

Construct class by giving the Rest Api route.
```
$apiRoute = 'https://jsonplaceholder.typicode.com/todos/1';

$resultsFromRequest = new JsonApiRequest($apiRoute);
```

Get the response by calling getResult()
```
$resultsFromRequest->getResult()
```

If JsonApiRequest fails it will return `"Curl request failed. Please check API route"`

---
### A PHP Unit Test a Guide

If not installed: 
`composer require --dev phpunit/phpunit ^7`

Check installation complete
`./vendor/bin/phpunit --version`

Add this to your composer.json 
```
{
    "autoload": {
        "classmap": [
            "src/"
        ]
    },
    "require-dev": {
        "phpunit/phpunit": "^7"
    }
}
```

Tests files in /tests

Working files into /src

run:
`composer install`
once again so autoload.php detects the 
classes src directory.

run test:
`./vendor/bin/phpunit tests/`


