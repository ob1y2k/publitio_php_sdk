<?php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');
var_dump($publitio->call('/files/list'));
var_dump($publitio->call('/files/list', 'GET', array('offset' => '0', 'limit' => '2')));

/*
Example output:

object(stdClass)#25 (7) {
  ["success"]=>
  bool(true)
  ["code"]=>
  int(200)
  ["limit"]=>
  int(2)
  ["offset"]=>
  int(0)
  ["files_total"]=>
  int(51)
  ["files_count"]=>
  int(2)
  ["files"]=>
  array(2) {
    [0]=>
    object(stdClass)#26 (24) {
      ["id"]=>
      string(8) "klyxlXDw"
      ["public_id"]=>
      string(13) "Selection_001"
      ["folder"]=>
      string(5) "Stix/"
      ["folder_id"]=>
      string(8) "g3eXepS1"
      ["title"]=>
      string(13) "Selection_001"
      ["description"]=>
      string(0) ""
      ["tags"]=>
      string(0) ""
      ["type"]=>
      string(5) "image"
      ["extension"]=>
      string(3) "png"
      ["size"]=>
      int(50597)
      ["width"]=>
      int(1596)
      ["height"]=>
      int(233)
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
      string(51) "https://media.publit.io/file/Stix/Selection_001.png"
      ["url_thumbnail"]=>
      string(70) "https://media.publit.io/file/w_300,h_200,c_fill/Stix/Selection_001.jpg"
      ["url_download"]=>
      string(275) "https://media.publit.io/download/Stix/Selection_001.png?at=eyJpdiI6Im9NR1k0ckpVWDd3SDUyb3dsYnA2Umc9PSIsInZhbHVlIjoiWEVLbXYrZzRoUE1lNm5FMmZPQ3Y2cVRaNGNKRUN5Zkg1OUcrZ3ZSenNTZz0iLCJtYWMiOiIzZTE1OGEzYjhmYmIxNzJlNjkzMjc0MTdlMDM1ZjM2NDJiOTNjNWExZWZiODU5ZTk5N2Y4ZmEwMmUwYTdkZWMyIn0="
      ["versions"]=>
      int(1)
      ["hits"]=>
      int(4)
      ["created_at"]=>
      string(19) "2019-08-13 22:35:15"
      ["updated_at"]=>
      string(19) "2019-08-13 22:35:15"
    }
    [1]=>
    object(stdClass)#19 (24) {
      ["id"]=>
      string(8) "obT4yeMA"
      ["public_id"]=>
      string(15) "Selection_001-o"
      ["folder"]=>
      string(5) "Stix/"
      ["folder_id"]=>
      string(8) "g3eXepS1"
      ["title"]=>
      string(13) "Selection_001"
      ["description"]=>
      string(0) ""
      ["tags"]=>
      string(0) ""
      ["type"]=>
      string(5) "image"
      ["extension"]=>
      string(3) "png"
      ["size"]=>
      int(50597)
      ["width"]=>
      int(1596)
      ["height"]=>
      int(233)
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
      string(53) "https://media.publit.io/file/Stix/Selection_001-o.png"
      ["url_thumbnail"]=>
      string(72) "https://media.publit.io/file/w_300,h_200,c_fill/Stix/Selection_001-o.jpg"
      ["url_download"]=>
      string(281) "https://media.publit.io/download/Stix/Selection_001-o.png?at=eyJpdiI6IjFOUlwvNDlvd0ZqbjFlY1hIVjNjU3NBPT0iLCJ2YWx1ZSI6ImtOXC9iNTJ3a053OXd1ME9adzJDWVJlSFIzK2g1cUVSdTg0QmtPT0xSRnZNPSIsIm1hYyI6IjhlZWU5MjRmZmU0NjVkNDIxY2JjZTE4ZWE2YjQ1MWJhODVmNmNmMTYyNmIwN2U1NWRiNWQzZWM3NGFiMTFmNGMifQ=="
      ["versions"]=>
      int(1)
      ["hits"]=>
      int(169)
      ["created_at"]=>
      string(19) "2019-08-14 11:22:10"
      ["updated_at"]=>
      string(19) "2019-08-15 21:50:02"
    }
  }
}
*/
