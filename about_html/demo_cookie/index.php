<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/8/17
 * Time: 上午 10:55
 */

$filename = 'reactionWithCookie.php';
$str = 'This is content of receiver, and it is read by php.' . "\n";
if (file_exists($filename)) {
    $handler = fopen($filename, 'r');
    $str .= fread($handler, filesize($filename));
    fclose($handler);
} else {
    $str .= 'file ' . $filename . ' does not found.';
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo Cookie</title>
    <script src="CookieOperator.js"></script>
</head>
<body>
<h1>This is a pure html, exclude php content.</h1>
<form>
    <input type="text" name="index" style="width: 180px;" placeholder="input a value for cookie index">
    <input type="text" name="value" style="width: 200px;" placeholder="a value for index specify value">
    <br>
    <textarea id="resultArea" style="width: 800px; height: 450px;"><?= $str ?></textarea>
</form>
<script>
    function refrechResult(msg) {
        document.getElementById('resultArea').innerHTML += msg;
    }
</script>
</body>
</html>
