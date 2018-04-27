<?php

namespace MyApi\Services;

class StudentsPerCourse extends \MyApi\ContextProcessorServiceAbstract
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
    
    private function cherche()
    {
        // process the data (i.e. save to database or/and send email)
        $dbo = $this->getDbo();
        $code = $dbo->quote(\RequestHandler\DataSanitizer::sanitize('code', 'post'));
        $statement = 'SELECT s.*,sc.course_id '
                . 'FROM student_courses sc JOIN courses c ON c.id=sc.course_id '
                . ' JOIN students s ON s.id=sc.student_id '
                . 'WHERE c.code = ' . $code;
        
        $results = $dbo->loadAssocList($statement);
        
        $this->output = array(
            'data' => $results,
            'success' => true,
            'message' => 'Successfully processed.'
        );
        
    }
}