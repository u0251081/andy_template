<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/8/19
 * Time: 下午 06:51
 */

require_once 'myClass.php';
require_once 'Other.php';

$namespace = 'test';

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

$class = POST('G');
$method = POST('U');
if (strlen($class) > 0 and strlen($method) > 0) {
    $className = $namespace . '\\' . $class;
    $classExists = class_exists($className);
    $status = ($classExists) ? '' : 'not ';
    print $class . ' is ' . $status . 'exists.' . "\n";
    if ($classExists) {
        $tmpFile = 'instanceTmp';
        $handler = fopen($tmpFile, 'w+');
        fwrite($handler, '<?php $object = new ' . $className . '(); ?>');
        fclose($handler);
        include $tmpFile;
        $methodExists = method_exists($object, $method);
        $status = ($methodExists) ? '' : 'not ';
        print $method . ' is ' . $status . 'exists in ' . $class . "\n";
        if ($methodExists) {
            $object->$method();
        }
        unlink($tmpFile);

    }
}