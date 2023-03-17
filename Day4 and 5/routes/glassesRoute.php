<?php


function glassesRoute() {
    $glassesController = new GlassesController() ;
    $next = 0 ;
    $prev = 0 ;
    switch ($_SERVER["REQUEST_METHOD"]){
        case 'GET' :
            try{
                if ( isset( $_GET["id"] ) ) { // get the product by the id 
                    $result = $glassesController->getGlasses($_GET["id"]);
                    require_once('views/showGlasses.php'); // use result to set data in this view
                }
                else { 

                    $current_index = isset($_GET["recordNumber"]) && is_numeric($_GET["recordNumber"])? (int) $_GET["recordNumber"] : 0 ;
                    $next_index = ($current_index + __RECORD_PER_PAGE__< 16) ? $current_index + __RECORD_PER_PAGE__ :0;
                    $previous_index = ($current_index - __RECORD_PER_PAGE__ > 0) ? $current_index - __RECORD_PER_PAGE__ :0; 
                    $rows = $glassesController->getGlasses(NULL , array() , $current_index);
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