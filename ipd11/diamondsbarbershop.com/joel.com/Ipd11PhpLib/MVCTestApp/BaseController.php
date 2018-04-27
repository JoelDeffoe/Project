<?php

namespace MVCTestApp;

abstract class BaseController
{
    abstract public function load();
    
    abstract public function insert();
    
    abstract public function update();
    
    abstract public function delete();
}