<?php

namespace MyApi;

abstract class ContextProcessorServiceAbstract
{
    private static $dbo = null;
    protected $output = array();

    abstract public function setUriParts(array $uriParts);
    
    abstract public function execute();
    
    public final function getOutputAsArray()
    {
        return $this->output;
    }
    
    public final function getDbo()
    {
        if (self::$dbo === null) {                 //databas //hoste //user//password//databas na me //
            $dbSettings = new \Database\DbSettings('mysql', 'localhost', 'user', 'user', 'test');
            self::$dbo = new \Database\Dbo($dbSettings);
        }
        return self::$dbo;
    }
}