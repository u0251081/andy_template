<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/8/19
 * Time: 下午 05:47
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

define('FileName', 'TargetFile.php');

$action = POST('action');
$read = in_array('read',$action);
$write = in_array('write',$action);
print ($read)? 'selected read':'not selected read';
print "\n";
print ($write)? 'selected write':'not selected write';
print "\n";
if (in_array('write', $action)) writeContent();
if (in_array('read', $action)) ReadContent();
function ReadContent()
{
    print 'reading file ...' . "\n";
    $fileContent = file_get_contents(FileName);
    print $fileContent;
    exit();
}

function writeContent()
{
    print 'writing file ...' . "\n";
    $newContent = POST('content');
    $handler = fopen(FileName, 'w+');
    $result = fwrite($handler, $newContent);
    if ($result === false) print 'some error is occur' . "\n";
    else print "\n" . $result . ' byte has been written' . "\n";
    rewind($handler); // 重置指標
    print 'check file content ...' . "\n";
    $content = fread($handler, filesize(FileName));
    print $content . "\n";
}

/*
 * example on php.net
 * function fwrite_stream($fp, $string) {
 *     for ($written = 0; $written < strlen($string); $written += $fwrite) {
 *         $fwrite = fwrite($fp, substr($string, $written));
 *         if ($fwrite === false) {
 *             return $written;
 *         }
 *     }
 *     return $written;
 * }
 */
?>