<?php

class Counter{

    private $_counter;

    public function __construct(){

        $this->_counter = $this->getCount();
    }

    public function getCount(){

        if(file_exists(VISITS)){

            return intval(file_get_contents(VISITS));

        }else{

            return 0 ;
        }
    }

    private function increment(){

        
        if(!isset($_SESSION[PRIVATE_KEY])){

            $this->_counter++;
            $_SESSION[PRIVATE_KEY] = true;
            return $this->_counter;

        }else{
            return false;
        }

    }
    private function update(){

        $fs = fopen(VISITS , "w+");
        fwrite($fs , $this->_counter);
        fclose($fs);
    }

    public function increment_and_update(){

        if($this->increment()){

            $this->update();
        }
    }

}