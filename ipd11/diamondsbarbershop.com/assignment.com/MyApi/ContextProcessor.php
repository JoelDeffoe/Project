<?php

namespace MyApi;

class ContextProcessor
{
    private $output = array();
    
    public function process($uri)
    {
        $parts = explode('/', $uri);
        
        if (sizeof($parts) > 1)
        {
            $parts[0] = ucwords($parts[0]);
            $service = 'MyApi\Services\\'.$parts[0];
            $serviceObj = new $service;
            
            if ($serviceObj instanceof ContextProcessorServiceAbstract)
            {
                unset($parts[0]);
                $uriParts = explode('/', implode('/', $parts));
                $serviceObj->setUriParts($uriParts);
                $serviceObj->execute();
                $this->output = $serviceObj->getOutputAsArray();
            }
        }
    }
    
    public function getOutputAsArray()
    {
        return $this->output;
    }
}