<?php

namespace MVCTestApp;

abstract class BaseModel
{
    abstract public function getRecord();
    
    abstract public function getRecords();
    
    abstract public function updateRecord();
    
    abstract public function addRecords();
    
    abstract public function deleteRecords();
}