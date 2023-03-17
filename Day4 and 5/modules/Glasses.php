<?php

class Glasses {

    private $_handler;
    private $_table ;

    public function __construct ($_table) {
        $this->_table = $_table;
        $this->connect();
    }

    private function connect() {
        try {
            $handler = mysqli_connect(__HOST__,__USER__,__PASSWORD__,__DB__);
            if ($handler){
                $this->_handler = $handler ; //now this object has a handler to $_table do what ever you want
                return true;
            }
            else {
                return false;
            }
        }catch (Exception $exception){
            throw new Exception( "Server error" );
        }
    }


    private function disconnect () {
        if ($this->_handler){
            mysqli_close($this->_handler);
        }
    }

    private function getResults ($sql) {
        
        if (__DEBUG_MODE__) {
            echo '<h3> '.$sql.' </h3>';
        }
        $handlerResults = mysqli_query($this->_handler,$sql);
        $arrayResults = array();
        if ( ! $handlerResults ) {
            throw new Exception( "Server error" ); 
        }

        while ( $row = mysqli_fetch_array($handlerResults, MYSQLI_NUM) ){
            $arrayResults [] =  array_change_key_case($row);
        }
        $this->disconnect(); // close the connection
        return $arrayResults ;
    }


    public function getData ($fields = array(),  $start = 0) { //fields --> which kind of columns you want to select
        
        $table = $this->_table ;
        $sql = NULL ;
        if ( empty($fields) ) {
            $sql = "select * from ".$table;
        }else {

            $sql = "select ";

            foreach ($fields as $field) {
                $sql .= $field.", ";
            }

            $sql .= "from ".$table;

            $sql = str_replace(', from' , 'from' , $sql);
        }
        $sql .= " limit ".$start."," .__RECORD_PER_PAGE__ ;

        try{
            $result = $this->getResults ($sql); // returns an array with all data 
      
        }catch (Exception $exception){
            throw new Exception( $exception->getMessage() );
        }
        
        return $result ;
    }

    public function getDataById ($field , $fieldValue) {
        
        $table = $this->_table ;
        $sql = 'select * from '. $table.' where '.$field.'='.$fieldValue ;

        try{
            $result = $this->getResults ($sql); // returns an array with all data 
      
        }catch (Exception $exception){
            throw new Exception( $exception->getMessage() );
        }
        
        return $result ;
    }
} 