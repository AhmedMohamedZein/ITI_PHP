<?php

function write_to_file () {
    $fp = fopen(_Saving_File_,"a+");
    $string_to_write = date("F j Y g i a")." ,";
    $string_to_write.= " ";
    $string_to_write.= $_SERVER['REMOTE_ADDR']." ,"; 
    $string_to_write.= " ";
    $string_to_write .= implode(' , ',$_POST);
    fwrite($fp , $string_to_write.PHP_EOL);
    fclose($fp);
}


function read_from_file () {
    return file(_Saving_File_);
}