<?php
session_start(); // for fetching session

// For Google OAuth Login in PHP
// include('LoginWithGoogle.php');

//Reset OAuth access token
// $google_client->revokeToken();

session_destroy();

header("location:index.php");
?>