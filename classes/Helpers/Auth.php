<?php

namespace Helpers;

class Auth {

    static $loginUrl = '/signIn.php';

    static function check()
    {
        session_start();
        if(isset($_SESSION['guest']))
        {
            return $_SESSION['guest'];
        }else{
           return HTTP::redirect(static::$loginUrl, 'auth=fail');
        }
    }

    // static function isLoggedIn()
    // {
    //     session_start();
    //     return isset($_SESSION['guest']);
    // }

    // static function checkRoom()
    // {
    //     session_start();
    //     if(isset($_SESSION['room']))
    //     {
    //         return $_SESSION['room'];
    //     }else{
    //        return HTTP::redirect(static::$loginUrl, 'auth=fail');
    //     }
    // }
}

