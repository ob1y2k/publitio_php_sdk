<?php
$publitio = new \Publitio\API('<API Key>', '<API Secret>');
var_dump($publitio->call('files/player/<File ID>', 'GET', array(
    'player' => '<Player ID>',
    'adtag' => '<Adtag ID>'
)));

/*
Example output:

object(stdClass)#25 (6) {
  ["success"]=>
  bool(true)
  ["code"]=>
  int(200)
  ["embed_url"]=>
  string(32) "//media.publit.io/file/ya-Z.html"
  ["player_html"]=>
  string(866) "<div oncontextmenu="return false;" id="publitio_Z4nQ225v" class="publitioPlayer" ><div id="publitio_ph_Z4nQ225v" class="publitioPlaceHolder" ></div></div><link href="//static.publit.io/css/publitio_player.min.css" rel="stylesheet" /><script src="//static.publit.io/js/publitio_player.min.js"></script><script src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script><script type="text/javascript">var publitio_Z4nQ225v = new Publitio({version: "1.3", type: "image", id: "Z4nQ225v", title: "ya", width: "620", height: "460", quality: "480", duration: "60", thumbnails: "true", muted: "false", fileSources: {mp4:"https://media.publit.io/file/ya-Z.mp4", webm:"https://media.publit.io/file/ya-Z.webm", ogv:"https://media.publit.io/file/ya-Z.ogv", jpg:"https://media.publit.io/file/ya-Z.jpg"}, adTag: "", autoPlay: 0, controlBar: "true", playerSkin: "grey"});</script>"
  ["source_html"]=>
  string(90) "<img oncontextmenu="return false;" src="https://media.publit.io/file/ya-Z.png" alt="ya" />"
  ["iframe_html"]=>
  string(343) "<div><div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 74.19%;"><figure><iframe src="//media.publit.io/file/ya-Z.html?player=myplayer22&amp;adtag=" scrolling="no" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute; overflow:hidden;" allowfullscreen=""></iframe></figure></div></div>"
}
*/
