<?php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');
var_dump($publitio->call('files/show/<File ID>', 'GET'));

/*
Example output:

object(stdClass)#25 (26) {
  ["success"]=>
  bool(true)
  ["code"]=>
  int(200)
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
  string(37) "https://media.publit.io/file/ya-j.png"
  ["url_thumbnail"]=>
  string(56) "https://media.publit.io/file/w_300,h_200,c_fill/ya-j.jpg"
  ["url_download"]=>
  string(265) "https://media.publit.io/download/ya-j.png?at=eyJpdiI6IldcLytrUnE3eFBVb2V3a3NQd2F5ekVnPT0iLCJ2YWx1ZSI6IkorbExLY3F6RWo4VG1BYnY3a0FMZkJzVmtiXC9cL2ozWlRTSlg3WFVVZ0NzRT0iLCJtYWMiOiJmY2YyYWIwMjhlZjJiNzc2M2QxNWIyM2FlMGU5YzVmMzc0ZDg4YTdlZDRlMjQ3ODJkOTA0ZDlmOTExZTdjYTU5In0="
  ["versions"]=>
  int(0)
  ["hits"]=>
  int(0)
  ["created_at"]=>
  string(19) "2019-08-23 11:18:04"
  ["updated_at"]=>
  string(19) "2019-08-23 11:18:04"
}
*/
