<?php
	
	
// -----------------------------------------------------------------------------------------------------------
// Pokestops datas 
// Total pokestops
// Total lured
// -----------------------------------------------------------------------------------------------------------

$captcha['timestamp'] = $timestamp;

// get amount of accounts requiring a captcha
$datetime = date("Y-m-d H:i:s", time() - 3610);
$req = "SELECT COUNT(*) as total FROM workerstatus WHERE message LIKE '%encountering a captcha%' and last_modified > '$datetime'";
$result 	= $mysqli->query($req);
$data 		= $result->fetch_object();

$captcha['captcha_accs'] = $data->total;




// Add the datas in file

$capdatas[] 	= $captcha;
$json 		= json_encode($capdatas);

file_put_contents($captcha_file, $json);
