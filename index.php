<?php 

// Include our config file
require_once(__DIR__ . '/config/config.php');
require_once(__DIR__ . '/config/utilities.php');
require_once(__DIR__ . '/controller/GameController.php');
require_once(__DIR__ . '/controller/RequestController.php');
require_once(__DIR__ . '/exception/RequestException.php');


$debug = true;
if (isset($debug) && $debug) {
	dump_post();
}

// To keep it simple, use this controller as some sort of middleware
$request = new RequestController($_POST);

if ($request->isValid()) {
	$game = new GameController();
}
else {
	echo "Invalid token";
	exit;
}

// Get Slack action
$fn = $request->getRoute();

// By default fn will return help
// If the action is defined, call it and send the response back
if(isset($fn) && $fn && method_exists($game, $fn)) {
	$response = $game->$fn();
	my_http_request($response);
}

// Simple function to post to Slack
// @TODO change request to allow for more variables
// @TODO Add some logging
// @TODO Maybe wrap into a class
function my_http_request($response) {
	$url = "https://hooks.slack.com/services/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";
	$request = ['text' => $response];
	$data_string = json_encode($request); 
	$headers= [
		'Content-Type: application/json',
		'Content-Length: ' . strlen($data_string)
	];                                                                    

	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, $url); 
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true ); 
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	$result = curl_exec( $ch ); 
	curl_close($ch);
	return $result;
}
?>