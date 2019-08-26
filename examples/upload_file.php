<?php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');

// Uploading a media file:
var_dump($publitio->uploadFile(fopen('/path/to/file.png', 'r')));
var_dump($publitio->uploadFile(fopen('/path/to/file.png', 'r'), 'file')); // Same as above

// Uploading a watermark:
var_dump($publitio->uploadFile(fopen('/path/to/file.png', 'r'), 'watermark'));

// Adding custom options:
var_dump($publitio->uploadFile(fopen('/path/to/file.png', 'r'), 'file', array(
    'public_id' => '<Public ID>',
    'title' => '<Title>'
)));

/*
Example output:

object(stdClass)#30 (27) {
  ["success"]=>
  bool(true)
  ["code"]=>
  int(201)
  ["message"]=>
  string(13) "File uploaded"
  ["id"]=>
  string(8) "MqR6tSLl"
  ["public_id"]=>
  string(4) "ya-M"
  ["folder"]=>
  NULL
  ["folder_id"]=>
  NULL
  ["title"]=>
  string(2) "ya"
  ["description"]=>
  string(0) ""
  ["tags"]=>
  string(0) ""
  ["type"]=>
  string(5) "image"
  ["extension"]=>
  string(3) "png"
  ["size"]=>
  int(191560)
  ["width"]=>
  int(620)
  ["height"]=>
  int(460)
  ["privacy"]=>
  string(6) "public"
  ["option_download"]=>
  string(7) "enabled"
  ["option_ad"]=>
  string(7) "enabled"
  ["option_transform"]=>
  string(7) "enabled"
  ["wm_id"]=>
  NULL
  ["url_preview"]=>
  string(37) "https://media.publit.io/file/ya-M.png"
  ["url_thumbnail"]=>
  string(56) "https://media.publit.io/file/w_300,h_200,c_fill/ya-M.jpg"
  ["url_download"]=>
  string(265) "https://media.publit.io/download/ya-M.png?at=eyJpdiI6Imc5RTN4Z2VXcFlpZElGa01tb21EXC9BPT0iLCJ2YWx1ZSI6IldhOW5vOGIwM2RMQllyNXI4RWpxSGpWNjdISmc5Q0p2MWVHXC95bTZcL3dmOD0iLCJtYWMiOiIyN2EyMDA0ZTM1YTAxNmM3MmQ5ODI1ZGY1ZWY3NDI5MDEwYzNjODgwNjg1OTg4NGY5NjIwYWIwODg4ODYyYjkwIn0="
  ["versions"]=>
  int(0)
  ["hits"]=>
  int(0)
  ["created_at"]=>
  string(19) "2019-08-23 11:17:51"
  ["updated_at"]=>
  string(19) "2019-08-23 11:17:51"
}
*/
