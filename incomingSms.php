<?php

require_once 'autoload.php';
use Twiml;

$response = new Twiml;

$body = $_REQUEST['body'];

if(strtolower($body) == "YES") {
	$response->message("Ok, we will call you right now");
} else if(strtolower($body) == "NO") {
	$response->message("Bye");
}
print $response;