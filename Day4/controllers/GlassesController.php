<?php


// handle the Colums and but it in an assoiative array then passed to route

class GlassesController {

    private $_glassesModule ;

    public function __construct () {
        $this->_glassesModule = new Glasses('items');
    }

    public function getGlasses ($id = NULL) {
        // get from the GlassesController
        try {
            if ( isset($id) ) {
                $result =  $this->_glassesModule->getDataById( 'id' , $id) ;
            }
            else {
                $result =  $this->_glassesModule->getData() ;
            }
        }catch (Exception $exception){
            http_response_code(500);
            throw new Exception( $exception->getMessage() );
        }
        return $result ;
    }


}