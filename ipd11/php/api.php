<?php

// set response header to be JSON type
// with character set UTF-8
header('Content-Type: application/json; charset=UTF-8');

include __DIR__. '/defines.php';
include __DIR__. '/sessionInit.php';

// checking if this request was sent via ajax
$xhr = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) :  null;
$isAjaxRequest = $xhr === 'xmlhttprequest';

if ($isAjaxRequest || true)
{
    // param uri passed by .htaccess
    $uri = isset($_GET['uri']) ? $_GET['uri'] : '';

    // if uri exists
    if ($uri)
    {
        if (checkCsrfToken())
        {
            include __DIR__ . '/vendor/autoload.php';
            include __DIR__ . '/autoload.php';

            Ezpz\CustomErrorHandler::init();

            $cp = new MyApi\ContextProcessor();
            $cp->process($uri);
            echo json_encode($cp->getOutputAsArray());
        }
        else
        {
            echo json_encode(array('error'=>'Illegal request'));
        }
    }
    else
    {
        echo json_encode(array('error'=>'Illegal request'));
    }
}
else
{
    echo json_encode(array('error'=>'Illegal request'));
}