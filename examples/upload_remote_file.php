<?php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');
$url = 'https://www.sikids.com/sites/default/files/sikids/pages/images/cms/imce/users/thewiz/2011/08/nyjah-huston.jpg';

// Upload as media file:
var_dump($publitio->uploadRemoteFile($url));
var_dump($publitio->uploadRemoteFile($url, 'file')); // Same as above

// Upload as watermark:
var_dump($publitio->uploadRemoteFile($url, 'watermark'));

// Adding custom options:
var_dump($publitio->uploadRemoteFile($url, 'file', array(
    'public_id' => '<Public ID>',
    'title' => '<Title>'
)));

/*
Example output:

TODO
*/
