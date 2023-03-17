<?php


function glassesRoute() {

    $glassesController = new GlassesController() ;
    switch ($_SERVER["REQUEST_METHOD"]){
        case 'GET' :
            try{
                if ( isset( $_GET["id"] ) ) { // get the product by the id 
                    $result = $glassesController->getGlasses($_GET["id"]);
                    require_once('views/showGlasses.php'); // use result to set data in this view
                }
               else {
                $rows = $glassesController->getGlasses();
                    require_once('views/welcome.php');
               }
               //require views
            }catch (Exception $exception){
                throw new Exception( $exception->getMessage() );
            }
            break;
            
        default : 
            throw new Exception("Method not allowed!");
            http_response_code(405);
            break;
    }
}