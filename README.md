# Publitio PHP SDK

PHP SDK for Publitio API. This SDK works with PHP version 5.5 and up.

## Deprecated version

Version 1 of this SDK has been deprecated and its use is discouraged.
You can find the deprecated version on the [deprecated branch](https://github.com/ob1y2k/publitio_php_sdk/tree/deprecated).

## Installation

This SDK is installed via [Composer](https://getcomposer.org/).

Install Composer if you haven't already:

```bash
curl -sS https://getcomposer.org/installer | php
```

Install the Publitio SDK:

```bash
php composer.phar require publitio/publitio
```

If you have already installed Composer globally, use:

```bash
composer require publitio/publitio
```

After installing, require the Composer autoloader:

```php
require 'vendor/autoload.php';
```

## Usage

The `\Publitio\API` class presents the main interface to the Publitio RESTful API.
You can find more documentation about Publitio [here](https://publit.io/docs).

To instantiate the `API` class, provide your
API key and API secret (which you can find
on your  [Publitio dashboard](https://publit.io/dashboard)):

```php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');
```

To Make an API call, use the `call` method:

```php
$response = $publitio->call($call_url, $method, $args);
```

For a list of available calls, see [the docs](https://publit.io/docs).

- $call_url is the API call URL, for example '/files/list'.

- $method is the HTTP method, for example 'GET' or 'DELETE'.
Which of these you need depends on what kind of call you are making.
The method for each API URL is documented at [the docs](https://publit.io/docs).

- $args is an array of URL query parameters, such as `array('public_id' => 'foo')`.

- $response will be the response JSON parsed using `json_decode`.
Note: this is a PHP object, not an array.

Use the `call` method when you aren't going to be uploading any files with the call.
If you wish to upload a file, use the uploadFile or uploadRemoteFile methods:

```php
$publitio->uploadFile(fopen('path/to/file.png', 'r'));
```

## Documentation

For complete documentation of this SDK,
see [this page](https://ob1y2k.github.io/publitio_php_sdk/html/annotated.html).

## Example

For plenty more usage examples, see the
[examples](https://github.com/ob1y2k/publitio_php_sdk/tree/master/examples) directory.

```php
$publitio = new \Publitio\API('<API Key>', '<API secret>');
$response = $publitio->call('/files/list', 'GET', array('offset' => '0', 'limit' => '10'));
var_dump($response);
```
