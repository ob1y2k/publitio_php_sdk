# Publitio PHP SDK

Simple PHP SDK for Publitio API

## Installation

Just include publitio_api.php in your project and initiate it 

```php

require_once('publitio_api.php'); 
// Please update xxxx with your key and yyyy with your secret
$publitio_api = new PublitioAPI('xxxx', 'yyyy');

```

See examples.php file for full list of available classes, methods and options

Sample call to List Files

```php

// list files
$response = $publitio_api->call("/files/list", "GET", array('offset' => '0', 'limit' => '10'));

//echo entire response
print_r($response);


```


