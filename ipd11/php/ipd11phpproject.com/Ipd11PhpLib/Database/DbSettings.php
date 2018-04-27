<?php

namespace Database;

class DbSettings
{
    private $settings;
    
    public function __construct(
            string $driver, 
            string $host, 
            string $username, 
            string $password,
            string $dbname='',
            array $options=null)
    {
        $this->settings = array(
            'driver' => $driver,
            'host' => $host,
            'username' => $username,
            'password' => $password,
            'dbname' => $dbname,
            'options' => $options
        );
    }
    
    public function getSettings() {
        return $this->settings;
    }
}