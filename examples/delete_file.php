<?php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');
var_dump($publitio->call('/files/delete/<File ID>', 'DELETE'));

/*
Example output:

object(stdClass)#25 (3) {
  ["success"]=>
  bool(true)
  ["code"]=>
  int(200)
  ["message"]=>
  string(50) "The file with with id 'jiJtj0W9' has been deleted!"
}
*/
