<?php

namespace MyApi\Services;

class Authentication extends \MyApi\ContextProcessorServiceAbstract
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
    
    private function login()
    {
        // process the data (i.e. save to database or/and send email)
        $username = '';
        $password = '';
        $row = null;
        $authorization = $this->getHeader('Authorization');
        if ($authorization)
        {
            $parts = explode(':', base64_decode($authorization));
            if (sizeof($parts) === 2)
            {
                $username = $parts[0];
                $password = md5($parts[1]);
            }
        }
        
        if ($username && $password) {
            $statement = 'SELECT id,block,password FROM test.users '.
                'WHERE username='.$this->getDbo()->quote($username);
            $row = $this->getDbo()->loadAssoc($statement);
        }
        
        if ($row && isset($row['password'])) {
            if ($row['block'] > 0) {
                $this->output = array(
                    'error' => true,
                    'message' => 'You are being blocked.'
                );
            }
            else if ($row['password'] === $password) {
                $this->output = array(
                    'success' => true,
                    'message' => 'Successfully logged in!'
                );
                \Ezpz\Common\Authentication::auth($row['id']);
            }
            else {
                $this->output = array(
                    'error' => true,
                    'message' => 'Wrong password!'
                );
            }
        }
        else
        {
            $this->output = array(
                'error' => true,
                'message' => 'Missing or invalid username'
            );
        }
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
