<?php 

    require_once 'vendor/autoload.php';
    @include 'config.php';

    function clientGoogle(){
        $client_id = "615317484177-muefiijk1fu4dbrp3fcdg1asqlceaebn.apps.googleusercontent.com"; 
        $client_secret = "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"; 
        $redirect_uri = "http://localhost/LTNC/check.php";
        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");
        return $client;
    }
?>