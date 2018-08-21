<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/8/21
 * Time: 下午 08:33
 */


function GET($index = false, $default = array())
{
    if (gettype($index) === 'string') {
        return (isset($_GET[$index])) ? $_GET[$index] : $default;
    }
    if ($index === false) {
        return $_GET;
    }
    return false;
}

function POST($index = false, $default = array())
{
    if (gettype($index) === 'string') {
        return (isset($_POST[$index])) ? $_POST[$index] : $default;
    }
    if ($index === false) {
        return $_POST;
    }
    return false;
}

function SESSION($index = false, $default = array())
{
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (gettype($index) === 'string') {
        return (isset($_SESSION[$index])) ? $_SESSION[$index] : $default;
    }
    if ($index === false) {
        return $_SESSION;
    }
    return false;
}