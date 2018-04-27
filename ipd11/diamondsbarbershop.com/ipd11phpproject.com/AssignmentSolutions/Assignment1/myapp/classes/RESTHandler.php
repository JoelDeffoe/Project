<?php

namespace myapp\classes;

abstract class RESTHandler
{
    final public static function handleRequest() {
    }

    abstract public function process();


    abstract public function getOutput();
}