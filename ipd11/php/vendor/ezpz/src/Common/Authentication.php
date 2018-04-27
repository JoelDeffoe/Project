<?php

namespace Ezpz\Common;

final class Authentication
{
    private function __construct() {}
    
    public static function isAuthed()
    {
        if (isset($_SESSION['logged_in'])) {
            $encryptedUserid = $_SESSION['logged_in'];
            if (isset($_SESSION[$encryptedUserid])) {
                return true;
            }
        }
        
        return false;
    }
    
    public static function auth($userid)
    {
        if (!isset($_SESSION['logged_in']))
        {
            $encryptedUserid = md5($userid);
            setcookie('logged_in', $encryptedUserid, 0, '/');
            $_SESSION['logged_in'] = $encryptedUserid;
            $_SESSION[$encryptedUserid] = $userid;
        }
    }
}