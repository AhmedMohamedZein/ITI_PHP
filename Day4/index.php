<?php
require('vendor/autoload.php');


// here we will make the routes like an entery point euch request will pass through here 

$requestURL = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$parseURL = explode('/' , $requestURL); 
$errors = NULL;

// the third item $parseURL --> { empty , ? , index.php } will be the root
// any request will be in the form of localhost/webServices/index.php/resourses/resoursesID



if ( isset ($parseURL[4]) ) {

    // Split Query params
    $parseEndPoint = explode('?' , $parseURL[4]);

    switch($parseEndPoint[0]) {
        
        case 'glasses' : 
            try {                
                glassesRoute();   
            }
            catch (Exception $exception) {
                $errors["error"] = $exception->getMessage();
                var_dump ( $errors );
            }
            break ;
        
         // add new end-points here 
            
        default : 
            $errors["error"] = 'You are not authorized to access this resource';
            http_response_code(404);
            break;
    }
}
else {
    require_once('views/rootPage.php');
}