# Publitio PHP SDK

PHP SDK for Publitio API. This SDK works with PHP version 5.5 and up.

## Deprecated version

On a separate branch.

## Installation

Via Composer.

## Documentation

From doxygen comments.

## Examples

```php
$publitio = new \Publitio\API('<API Key>', '<API secret>');
$response = $publitio->call("/files/list", "GET", array('offset' => '0', 'limit' => '10'));
var_dump($response);
```
