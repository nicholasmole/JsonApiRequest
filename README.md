# JsonApiRequest


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

run test:
`./vendor/bin/phpunit tests/`


