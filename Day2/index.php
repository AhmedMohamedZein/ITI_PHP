<?php

require_once("config.php");

$errors = [];
$success= "";
if ( !empty($_POST) ) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    if ( !empty($name) ){
        // check if the name is more than 100 character
        if (strlen($name) >= _MAX_CHAR_NAME_){
            array_push($errors , "invalid name is more than 100 character !");
        } 
    } else {
        array_push($errors,"invalid your name is empty!");
    }

    if ( !empty($email) ) {
        $patterns = "/(\@)/i";
        if ( ! preg_match_all($patterns,$email) ){
           array_push($errors ,"invalid email address");
        }
    } else {
        array_push($errors,"invalid your email is empty!");
    }
    if ( empty($message) && strlen ( $message ) <= _MAX_CHR_TEXT_AREA_  ) {
        array_push($errors,"invalid message body is empty!");

    }

    //  no errors
    if ( !$errors ) {
        $success = _THANK_YOU_MESSAGE_ ; 
    }
}


require_once("views/contact.php");
