<?php

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

function dynamicClassMethod($class, $method)
{
    // check class exists
    if (class_exists($class)) {
        // instance object
        $object = new $class();
        // check method is exists in class
        if (method_exists($object, $method)) {
            $object->$method();
            return true;
        }
    }
    return false;
}

function generateFileName()
{
    do {
        $result = generateRandomString();
    } while (file_exists($result));
    return $result;
}

function generateRandomString($source = '', $length = 10, $special = false)
{
    if (gettype($source) === 'string') {
        if ($source === '') $source = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if ($special === true) $source .= '!@#$%^&*()_+-=/|?><.,"\'\\:;';
        $tableLength = strlen($source) - 1;
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= $source[rand(0, $tableLength)];
        }
        return $result;
    } else {
        return false;
    }
}

?>
<link rel="icon" href="/andy/favicon.ico">
<div style="display:flex;flex-direction:column;">
    <a href="about_html/demo_md5">demo_md5</a>
    <a href="about_html/demo_ajax">demo_ajax</a>
    <a href="about_html/demo_jquery_steps">demo_jquery_steps</a>
    <a href="about_php/demo_php_connect_mysql/sample_connect.php">demo_php_connect_mysql</a>
    <a href="about_php/demo_php_OOP">demo_php_OOP</a>
    <a href="about_php/demo_php_draw">demo_php_draw</a>
</div>