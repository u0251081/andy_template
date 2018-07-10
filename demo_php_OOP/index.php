<?php
/**
 * Created by PhpStorm.
 * User: andychen
 * Date: 7/10/18
 * Time: 11:31 PM
 */
include_once 'demoCls1.php';
$something1 = new demoCls1();
$str1 = print_r($something1);
$object_data = array(
    'para1' => '001',
    'para2' => 002,
    'para3' => 0.03
);
$something2 = new demoCls1($object_data);
$str2 = print_r($something2);
?>