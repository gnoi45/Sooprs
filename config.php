<?php
require('./vendor/autoload.php');

# Add your client ID and Secret ssooprs
// $client_id = "122940562534-jnom4r92op4cqvu3lj127450qji7qnmf.apps.googleusercontent.com";
// $client_secret = "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";

// sooprs04
// $client_id = "241966779723-5962b7a7dm62btfg2jgke2orgai2vc31.apps.googleusercontent.com";
// $client_secret = "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";

// sandeep gmail 
$client_id = "241966779723-5962b7a7dm62btfg2jgke2orgai2vc31.apps.googleusercontent.com";
$client_secret = "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";

$client = new Google\Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);

# redirection location is the path to login.php
$redirect_uri = 'https://sooprs.com/login-professional';
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");