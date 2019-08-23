<?php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');
var_dump($publitio->call('/files/update/<File ID>', 'PUT', array(
    'title' => '<Title>',
    'description' => '<Description>',
    'tags' => '<Tag1> <Tag2>',
    'privacy' => '1',
    'option_download' => '1',
    'option_ad' => '1'
)));

/*
Example output:

object(stdClass)#25 (27) {
  ["success"]=>
  bool(true)
  ["code"]=>
  int(200)
  ["message"]=>
  string(44) "The file with id 'jiJtj0W9' has been updated"
  ["id"]=>
  string(8) "jiJtj0W9"
  ["public_id"]=>
  string(4) "ya-j"
  ["folder"]=>
  NULL
  ["folder_id"]=>
  NULL
  ["title"]=>
  string(13) "&lt;Title&gt;"
  ["description"]=>
  string(19) "&lt;Description&gt;"
  ["tags"]=>
  string(25) "&lt;Tag1&gt;,&lt;Tag2&gt;"
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
  string(37) "https://media.publit.io/file/ya-j.png"
  ["url_thumbnail"]=>
  string(56) "https://media.publit.io/file/w_300,h_200,c_fill/ya-j.jpg"
  ["url_download"]=>
  string(261) "https://media.publit.io/download/ya-j.png?at=eyJpdiI6IjdyYU1vQVwvMGVoYXdGRmdZemVCZVpnPT0iLCJ2YWx1ZSI6ImJpQ3VITWhuNVJtdjZVQ1ZyUDJQSjlKTVFzZ3d1V1c4TUJtYyt6YXh3WW89IiwibWFjIjoiMjk5YzI2NTkwNjNjNWYxZjRhNmM0MmFmOTk1NjEzMzc3Y2ZkMGRmNTllZWVhOWI4MTBkNDIyOThjMjUyZDAzMyJ9"
  ["versions"]=>
  int(0)
  ["hits"]=>
  int(0)
  ["created_at"]=>
  string(19) "2019-08-23 11:18:04"
  ["updated_at"]=>
  string(19) "2019-08-23 11:33:50"
}
*/
