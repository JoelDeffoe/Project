<?php

namespace MyApi\Services;

class Contact extends \MyApi\ContextProcessorServiceAbstract
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
        $dbSettings = new \Database\DbSettings('mysql', 'localhost', 'user', 'user');
        $dbo = new \Database\Dbo($dbSettings);
        
        $statement = 'INSERT INTO test.inquires(name, email, phone, subject, inquiries) VALUES('
                .$dbo->quote(\RequestHandler\DataSanitizer::sanitize('name', 'post'))
                .','.$dbo->quote(\RequestHandler\DataSanitizer::sanitize('email', 'post'))
                .','.$dbo->quote(\RequestHandler\DataSanitizer::sanitize('phone', 'post'))
                .','.$dbo->quote(\RequestHandler\DataSanitizer::sanitize('subject', 'post'))
                .','.$dbo->quote(\RequestHandler\DataSanitizer::sanitize('inquiries', 'post'))
                .')';
        $dbo->query($statement);
        
        //mail($_POST['email'], $_POST['subject'], $_POST['inquiries']);
        
        $this->output = array(
            'success' => true,
            'message' => 'Successfully processed.' . json_encode($_POST)
        );
    }
}