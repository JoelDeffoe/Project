<?php

namespace MyApi;

use Ezpz\Database\DbSettings;
use Ezpz\Database\Dbo;

abstract class ContextProcessorServiceAbstract
{
    protected $output = array();
    private static $dbo = null;

    abstract public function setUriParts(array $uriParts);
    
    abstract public function execute();
    
    final public function requestHandler() {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $request = 'MyApi\\RequestHandler\\'.$method.'Handler';
        $requestHandler = new $request;
        if ($requestHandler instanceof RESTHandler) {
            $requestHandler->process();
        }
        return $requestHandler;
    }
    
    protected function getDbo()
    {
        if (self::$dbo === null) {
            $dbSettings = new DbSettings('mysql', 'localhost', 'test', 'test');
            self::$dbo = new Dbo($dbSettings);
        }
        return self::$dbo;
    }
    
    public final function getOutputAsArray()
    {
        return $this->output;
    }
    
    public final function getHeader($param)
    {
        $headers = getallheaders();
        if (isset($headers[$param]))
        {
            return $headers[$param];
        }
        
        return null;
    }
}