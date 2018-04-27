<?php

namespace MVCTestApp;

class Model extends BaseModel
{
    private $dbo;
    
    public function __construct(\Database\DbSettings $dbSettings){
        $this->dbo = new \Database\Dbo($dbSettings->getSettings());
    }
    
    public function getRecord() {}
    
    public function getRecords() {}
    
    public function updateRecord() {}
    
    public function addRecords() {}
    
    public function deleteRecords() {}
}