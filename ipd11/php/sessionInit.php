<?php

function sessionInit()
{
    $id = session_id();
    if (!$id) {
        session_start();
        if (!getCSRFToken()) {
            $_SESSION[CSRF_TOKEN_NAME] = md5(uniqid(SESSION_ID));
        }
    }
}

function getCSRFToken()
{
    return isset($_SESSION[CSRF_TOKEN_NAME]) ? $_SESSION[CSRF_TOKEN_NAME] : null;
}

function checkCsrfToken()
{
    $headers = getallheaders();
    return isset($headers['csrftoken']) && $headers['csrftoken'] === getCSRFToken();
}

sessionInit();