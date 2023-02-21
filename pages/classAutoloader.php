<?php

//When you want to use a class from the classes directory:
//include this php script with: include 'classAutoloder.php'
//it will allow you to access all classes without having to include each file

spl_autoload_register('myAutoLoader');


function myAutoLoader($className){
    $path = "../classes/";
    $extension = ".class.php";
    $fullPath = $path.$className.$extension;

    if (!file_exists($fullPath)) {
        return false;
    }
    include_once $fullPath;
}

?>