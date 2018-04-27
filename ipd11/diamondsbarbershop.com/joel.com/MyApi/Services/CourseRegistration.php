<?php

namespace MyApi\Services;

class CourseRegistration extends \MyApi\ContextProcessorServiceAbstract
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
    
    private function courseRegistrationList()
    {
        $dbo = $this->getDbo();
        $statement = 'SELECT * FROM student_courses';
        $rows = $dbo->loadAssocList($statement);// todo: load data from database
        
        $this->output = array(
            'data' => $rows,
            'success' => true,
            'message' => 'Successfully processed.'
        );
    }
    
    private function add()
    {
        // process the data (i.e. save to database or/and send email)
        $dbo = $this->getDbo();
        
        $statement = 'INSERT INTO test.student_courses(student_id,course_id) VALUES('
                .$dbo->quote(\RequestHandler\DataSanitizer::sanitize('studentid', 'post'))
                .','.$dbo->quote(\RequestHandler\DataSanitizer::sanitize('courseid', 'post'))
                .')';
        
        $dbo->query($statement);
        
        //mail($_POST['email'], $_POST['subject'], $_POST['inquiries']);
        
        $this->output = array(
            'success' => true,
            'message' => 'Successfully processed.' . json_encode($_POST)
        );
        
    }
}