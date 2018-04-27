<?php

include __DIR__ . '/Ipd11PhpLib/autoload.php';
include __DIR__ . '/autoload.php';

$dbSettings = new Database\DbSettings("mysql", "localhost", "user", "user");

$myClass = new MyClass();
