<?php

require_once("config.php");

$error = "";
$success= "";
if ( !empty($_POST) ) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    if ( !empty($name) ){
        // check if the name is more than 100 character
        if (strlen($name) >= $MAX_CHAR_NAME){
            $error .= "invalid name is more than 100 character !"."<br>";
        } 
    } else {
        $error .= "invalid your name is empty!"."<br>";
    }

    if ( !empty($email) ) {
        $patterns = "/(\@)/i";
        if ( ! preg_match_all($patterns,$email) ){
            $error .= "invalid email address"."<br>";
        }
    } else {
        $error .= "invalid your email is empty!"."<br>";
    }
    if ( empty($message) && strlen ( $message ) <= $MAX_CHR_TEXT_AREA  ) {
        $error .= "invalid message body is empty!";

    }

} else {
    $error = " ";
}

// no error 
if ( empty($error) ) {
    $success .= $THANK_YOU_MESSAGE ; 
}

require_once("webpages/main.php");
