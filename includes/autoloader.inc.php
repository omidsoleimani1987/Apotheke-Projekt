<?php
/**
 * auto loader function is used in every page
 */
spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    
    $path = $_SERVER['DOCUMENT_ROOT'].'/classes/';
    $extention = '.class.php';
    $fullPath = $path . strtolower($className) . $extention;

    if(!file_exists($fullPath)) {
        return false;
    }

    include_once $fullPath;
    
}

