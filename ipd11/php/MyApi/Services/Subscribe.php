<?php

namespace MyApi\Services;

class Subscribe extends \MyApi\ContextProcessorServiceAbstract
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
    
    private function newsletter()
    {
        // process the data (i.e. save to database or/and send email)
        $dbSettings = new \Database\DbSettings('mysql', 'localhost', 'test', 'test');
        $dbo = new \Database\Dbo($dbSettings);
        
        $statement = 'INSERT INTO test.subscribers(name, email) VALUES('
                .$dbo->quote(\RequestHandler\DataSanitizer::sanitize('name', 'post'))
                .','.$dbo->quote(\RequestHandler\DataSanitizer::sanitize('email', 'post'))
                .')';

        $dbo->query($statement);
        
        //mail($_POST['email'], $_POST['subject'], $_POST['inquiries']);
        
        $this->output = array(
            'success' => true,
            'message' =>($_POST["name"]) .'  You are now subscribed!.' . json_encode($_POST)
        );
		
    }
	
	private function theList()
    {
        // process the data (i.e. save to database or/and send email)
        $dbSettings = new \Database\DbSettings('mysql', 'localhost', 'test', 'test');
        $dbo = new \Database\Dbo($dbSettings);
        
        $statement = 'SELECT * FROM test.subscribers';

        $rows = $dbo->loadAssocList($statement);
        
        $this->output = array(
			'data' => $rows,
            'success' => true,
            'message' => 'Success!'
        );
    }
}