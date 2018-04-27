<?php

namespace MyApi\Services;

class Voting extends \MyApi\ContextProcessorServiceAbstract
{
    private $uriParts = array();
    
    public function setUriParts(array $uriParts)
    {
        $this->uriParts = $uriParts;
    }
    
    public function execute()
    {
        // check if 
        if (sizeof($this->uriParts) && $this->uriParts[0])
        {
            if (method_exists($this, $this->uriParts[0]))
            {
                $this->{$this->uriParts[0]}();
            }
            else
            {
                $this->output = array('error' => 'Method '. $this->uriParts[0]);
            }
        }
        else
        {
            $this->output = array('error' => 'Illegal request.');
        }
    }
    
    private function vote()
    {
        // process the data (i.e. save to database or/and send email)
        
        $this->output = array(
            'success' => true,
            'message' => 'Yay! Voted'
        );
    }
    
    private function got()
    {
        // process the data (i.e. save to database or/and send email)
        
        $this->output = array(
            'success' => true,
            'message' => 'Yay! Voted'
        );
    }
}