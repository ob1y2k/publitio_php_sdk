<?php
header('Content-type: text/plain; charset=utf-8');

require_once('publito_api.php');
// Please update xxxx with your key and yyyy with your secret
$publito_api = new PublitoAPI('xxxx', 'yyyy');

/*_________________________*/
/* File Class             */

// list files
$response = $publito_api->call("/files/list", "GET", array('offset' => '0', 'limit' => '10'));

// create (upload) local file, simple
#$response = $publito_api->upload_file("samples/monkey.jpg", "file"); 

// create (upload) local file, all options
#$response = $publito_api->upload_file("samples/monkey.jpg", "file", array('title' => 'zzz', 'description' => 'yyyyyy', 'tags' => 'tag1 tag2', 'privacy' => '1', 'option_download' => '1', 'option_embed' => '1', 'ad' => '1', 'wm' => 'qDaq')); 

// create (remote upload) multiple files
#$response = $publito_api->call("/files/create/multi", "POST", array('files_count' => '3', 'file0url' => 'http://keepdsmile.com/publito/espreso/rasa1.jpg', 'file1url' => 'http://keepdsmile.com/publito/espreso/rasa2.jpg', 'file2url' => 'http://keepdsmile.com/publito/espreso/rasa3.jpg')); 

// show file with id 23dyM408
#$response = $publito_api->call("/files/show/23dyM408", "GET"); 

// update file with id 2Hjr3323
#$response = $publito_api->call("/files/update/2Hjr3323", "PUT", array('title' => 'xxxx', 'description' => 'wwww', 'tags' => 'tag1 tag2', 'privacy' => '1', 'option_download' => '1', 'option_embed' => '1', 'ad' => '1', 'wm' => 'qDaq')); // id

// delete file with id 2Hjr3323
#$response = $publito_api->call("/files/delete/2Hjr3323", "DELETE"); 

// get player for file with id 23dyM408
#$response = $publito_api->call("/files/player/23dyM408", "GET", array('player' => 'id', 'ad_tag' => 'id')); 

// get players for multiple files in one call
#$response = $publito_api->call("/files/players", "GET", array('player' => 'id', 'ad_tag' => 'id', 'auto_play' => '2', 'files_count' => '3', 'file0id' => '23dyM408', 'file1id' => '9oMwgG8u', 'file2id' => '4RZxkP4G', 'file2player' => 'id2', 'file2ad_tag' => 'id3', 'file2auto_play' => '1')); 

/*_________________________*/
/* Player Class             */

// list players
#$response = $publito_api->call("/players/list", "GET");

// create player
#$response = $publito_api->call("/players/create", "POST", array('name' => 'fliiby2', 'ad_tag_id' => 'myoverlay')); 

// show player with id fliiby
#$response = $publito_api->call("/players/show/fliiby2", "GET"); 

// update player with id fliiby2
#$response = $publito_api->call("/players/update/fliiby2", "PUT", array('ad_tag_id' => 'mypreroll', 'auto_play' => '1', 'skin' => '', 'geo_in' => '', 'geo_ex' => '')); // id

// delete player with id fliiby2
#$response = $publito_api->call("/players/delete/fliiby2", "DELETE"); 

/*_______________________________*/
/* Advertising (Ad Tags) Class   */

// list adtags
#$response = $publito_api->call("/advertising/list", "GET");

// create adtag
#$response = $publito_api->call("/advertising/create", "POST", array('name' => 'mytestad', 'tag' => 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dskippablelinear&correlator=')); 

// show adtag with id mytestad
#$response = $publito_api->call("/advertising/show/mytestad", "GET"); 

// update adtag with id mytestad
#$response = $publito_api->call("/advertising/update/mytestad", "PUT", array('tag' => 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dlinear&correlator=', 'geo_in' => '', 'geo_ex' => '')); // id

// delete adtag with id mytestad
#$response = $publito_api->call("/advertising/delete/mytestad", "DELETE"); 

/*_________________________*/
/* File Versions Class   */

// list versions for file with id 9oMwgG8u
#$response = $publito_api->call("/files/versions/list/9oMwgG8u", "GET");

// create new version from file with id 9oMwgG8u, with options width=320, height=240, crop=fill, watermark=qDaq
#$response = $publito_api->call("/files/versions/create/9oMwgG8u", "POST", array('output_format' => 'mp4', 'options' => 'w_320,h_240,c_fill,wm_qDaq')); 

// show file version with id 1SMlAQpS
#$response = $publito_api->call("/files/versions/show/1SMlAQpS", "GET"); 

// update file version with id 1SMlAQpS
#$response = $publito_api->call("/files/versions/update/1SMlAQpS", "PUT", array('privacy' => '1', 'protected' => '0')); 

// delete file version with id 1SMlAQpS
#$response = $publito_api->call("/files/versions/delete/1SMlAQpS", "DELETE"); 

/*_____________________*/
/* Watermarks Class   */

// list watermarks
#$response = $publito_api->call("/watermarks/list", "GET");

// create (upload) watermark from local file
#$response = $publito_api->upload_file("samples/smile.png", "watermark", array('name' => 'mytestwm', 'position' => 'bottom-right', 'padding' => '20')); 

// show watermark with id qDaq
#$response = $publito_api->call("/watermarks/show/qDaq", "GET"); 

// update watermark with id qDaq
#$response = $publito_api->call("/watermarks/update/qDaq", "PUT", array('name' => 'cutenamewm', 'position' => 'top-right', 'padding' => '10')); 

// delete watermark with id qhVu
#$response = $publito_api->call("/watermarks/delete/2gav", "DELETE"); 

/*_________________________*/

//echo entire response
print_r($response);

/*
//check & parse response 
$json_response = json_decode($response, true);
$publito_success = $json_response['success'];

if ($publito_success == false) {
	$publito_error_message = $json_response['error']['message'];
	$publito_error_code = $json_response['error']['code'];
	#echo "Error: ".$publito_error_message;    
} else {
	#echo "All good..do your stuff here (get id, html, etc. from response)";
}
*/

?>
