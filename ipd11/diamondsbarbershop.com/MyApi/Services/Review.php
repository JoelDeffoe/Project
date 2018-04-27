<?php

namespace MyApi\Services;

use RequestHandler\DataSanitizer;

class Review extends \MyApi\ContextProcessorServiceAbstract
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
    
    private function processData()
    {
        // process the data (i.e. save to database or/and send email)
        $values = array();
        $data = $this->requestHandler()->getDataAsArray();
        foreach($data as $key=>$value)
        {
            $values[] = $this->getDbo()->quote($value);
        }
        
        $statement = 'INSERT INTO test.inquires(name, email, comments) VALUES('.implode(',', $values).')';
        
        $this->getDbo()->query($statement);
        
        $this->output = array(
            'success' => true,
            'message' => 'Successfully processed!'
        );
    }
    
    public function reviewlist()
    {
        // process the data (i.e. save to database or/and send email)        
        $dbo = $this->getDbo();
        $headers = getallheaders();
        
        $statement = 'SELECT * FROM test.inquires';
        $results  = $dbo->loadAssocList($statement);
        
        $this->output = array(
            'data' => $results,
            'success' => true,
            'message' => 'Successfully processed!'
        );
    }
}
