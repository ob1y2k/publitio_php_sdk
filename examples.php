<?php
header('Content-type: text/plain; charset=utf-8');

require_once('publitio_api.php'); 
// Please update xxxx with your key and yyyy with your secret
$publitio_api = new PublitioAPI('xxxx', 'yyyy');

/*_________________________*/
/* File Class             */

// list files
$response = $publitio_api->call("/files/list", "GET", array('offset' => '0', 'limit' => '10'));

// create (upload) local file, simple
#$response = $publitio_api->upload_file("samples/monkey.jpg", "file"); 

// create (upload) local file, all options
#$response = $publitio_api->upload_file("samples/monkey.jpg", "file", array('title' => 'zzz', 'description' => 'yyyyyy', 'tags' => 'tag1 tag2', 'privacy' => '1', 'option_download' => '1', 'option_ad' => '1')); 

// create (remote upload) multiple files
#$response = $publitio_api->call("/files/create/multi", "POST", array('files_count' => '3', 'file0url' => 'http://keepdsmile.com/publitio/espreso/rasa1.jpg', 'file1url' => 'http://keepdsmile.com/publitio/espreso/rasa2.jpg', 'file2url' => 'http://keepdsmile.com/publitio/espreso/rasa3.jpg')); 

// show file with id 23dyM408
#$response = $publitio_api->call("/files/show/23dyM408", "GET"); 

// update file with id 2Hjr3323
#$response = $publitio_api->call("/files/update/2Hjr3323", "PUT", array('title' => 'xxxx', 'description' => 'wwww', 'tags' => 'tag1 tag2', 'privacy' => '1', 'option_download' => '1', 'option_ad' => '1')); // id

// delete file with id 2Hjr3323
#$response = $publitio_api->call("/files/delete/2Hjr3323", "DELETE"); 

// get player for file with id 23dyM408
#$response = $publitio_api->call("/files/player/23dyM408", "GET", array('player' => 'id', 'adtag' => 'id')); 

/*_________________________*/
/* Player Class             */

// list players
#$response = $publitio_api->call("/players/list", "GET");

// create player
#$response = $publitio_api->call("/players/create", "POST", array('name' => 'fliiby2', 'adtag_id' => 'myoverlay')); 

// show player with id myplayer
#$response = $publitio_api->call("/players/show/myplayer", "GET"); 

// update player with id myplayer
#$response = $publitio_api->call("/players/update/myplayer", "PUT", array('adtag_id' => 'mypreroll', 'auto_play' => '1', 'skin' => '')); // id

// delete player with id myplayer
#$response = $publitio_api->call("/players/delete/myplayer", "DELETE"); 

/*_______________________________*/
/* Advertising (Ad Tags) Class   */

// list adtags
#$response = $publitio_api->call("/players/adtags/list", "GET");

// create adtag
#$response = $publitio_api->call("/players/adtags/create", "POST", array('name' => 'mytestad', 'tag' => 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator=')); 

// show adtag with id mytestad
#$response = $publitio_api->call("/players/adtags/show/mytestad", "GET"); 

// update adtag with id mytestad
#$response = $publitio_api->call("/players/adtags/update/mytestad", "PUT", array('tag' => 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dlinear&correlator=')); // id

// delete adtag with id mytestad
#$response = $publitio_api->call("/players/adtags/delete/mytestad", "DELETE"); 

/*_________________________*/
/* File Versions Class   */

// list versions for file with id 9oMwgG8u
#$response = $publitio_api->call("/files/versions/list/9oMwgG8u", "GET");

// create new version from file with id 9oMwgG8u, with options width=320, height=240, crop=fill
#$response = $publitio_api->call("/files/versions/create/9oMwgG8u", "POST", array('output_format' => 'mp4', 'options' => 'w_320,h_240')); 

// show file version with id 1SMlAQpS
#$response = $publitio_api->call("/files/versions/show/1SMlAQpS", "GET"); 

// update file version with id 1SMlAQpS
#$response = $publitio_api->call("/files/versions/update/1SMlAQpS", "PUT", array()); 

// delete file version with id 1SMlAQpS
#$response = $publitio_api->call("/files/versions/delete/1SMlAQpS", "DELETE"); 

/*_____________________*/
/* Watermarks Class   */

// list watermarks
#$response = $publitio_api->call("/watermarks/list", "GET");

// create (upload) watermark from local file
#$response = $publitio_api->upload_file("samples/smile.png", "watermark", array('name' => 'mytestwm', 'position' => 'bottom-right', 'padding' => '20')); 

// show watermark with id mytestwm
#$response = $publitio_api->call("/watermarks/show/mytestwm", "GET"); 

// update watermark with id mytestwm
#$response = $publitio_api->call("/watermarks/update/mytestwm", "PUT", array('position' => 'top-right', 'padding' => '10')); 

// delete watermark with id mytestwm
#$response = $publitio_api->call("/watermarks/delete/mytestwm", "DELETE"); 

/*_________________________*/

//echo entire response
print_r($response);

/*
//check & parse response 
$json_response = json_decode($response, true);
$publitio_success = $json_response['success'];

if ($publitio_success == false) {
	$publitio_error_message = $json_response['error']['message'];
	$publitio_error_code = $json_response['error']['code'];
	#echo "Error: ".$publitio_error_message;    
} else {
	#echo "All good..do your stuff here (get id, html, etc. from response)";
}
*/

?>
