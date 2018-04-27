<?php

namespace MyApi\RequestHandler;

use RequestHandler\DataSanitizer;

class GETHandler extends \MyApi\RESTHandler {

    public function process() {
        
        foreach($_GET as $k=>$v) {
            if ($k !== 'uri') {
                $this->data[$k] = DataSanitizer::sanitize($k, 'get');
            }
        }
    }
}
