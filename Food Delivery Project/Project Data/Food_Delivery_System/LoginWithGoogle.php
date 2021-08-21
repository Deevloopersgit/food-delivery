<?php
include_once "header.php";

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('539054682068-r95e4jqojao0atnv706vbi38ulk6b5i4.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('e-eqfXg25zqDj9gVGbvWE0II');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Food_Delivery_System/Gmail_Registration.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>