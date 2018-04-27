<?php

namespace Ezpz;

final class CustomErrorHandler
{
    private function __construct() {}
    
    public static function init()
    {
        set_exception_handler("Ezpz\\CustomErrorHandler::exceptionHandler");
        set_error_handler("Ezpz\\CustomErrorHandler::errorHandler");
    }
    
    public static function errorHandler($errno, $errstr, $errfile, $errline, $errcontext)
    {
        // do something
        die(json_encode(array(
            $errno,
            $errstr,
            $errfile,
            $errline,
            $errcontext
        )));
        
        return true;
    }
    
    public static function exceptionHandler($e)
    {
        echo "Error occurred on: " . $e->getLine() .
            ' in file name: '. $e->getFile() .
            ' with the error message: ' . $e->getMessage();
    }
}