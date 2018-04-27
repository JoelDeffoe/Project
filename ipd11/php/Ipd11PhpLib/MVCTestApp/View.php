<?php

namespace MVCTestApp;

class View extends BaseView
{
    private $model;
    private $controller;
    private $output;

    public function __construct(Controller $controller, Model $model) {
        $this->controller = $controller;
        $this->model = $model;
    }
    
    public function loadContent($tmpl)
    {
        
    }
    
    public function getOutput() {
        return $this->output;
    }
}