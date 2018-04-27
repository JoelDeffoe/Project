<?php

namespace MyApi;

abstract class RESTHandler
{
    protected $data = array();

    abstract public function process();
    
    final public function getDataAsArray() {
        return $this->data;
    }
}