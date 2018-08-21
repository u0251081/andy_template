<textarea readonly style='width: 800px; height:450px;'>
<?php
/**
 * Created by PhpStorm.
 * User: andychen
 * Date: 2018/6/27
 * Time: 下午 1:01
 */
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $database = "database";
	/* for u0251081.byethost15.com */
	$servername = 'sql209.byethost15.com';
    $username = "b15_22349437";
    $password = "a123932";
    $database = "b15_22349437_db";

    /*
    // php7 sample start
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    // php7 sample end
    */

    // phpinfo();

    // php5 sample start
    $con = mysql_connect($servername,$username,$password);
    // $con = true;
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    } else {
        echo 'connect success'."\n";
    }
    mysql_query('set names utf8');
    mysql_select_db("$database");
    $my_data = mysql_query('select * from some_data');
    while( $cur_row = mysql_fetch_array($my_data)) {
        // doing something
        $rl_data[] = $cur_row;
    }
    mysql_close($con);

    // 測試特殊字元的輸入
    $rl_data['special character test'] = "\t\r\n";
    $js_data = json_encode($rl_data);
    // 預防 json data 中包含換行.tab
    $js_data = special_character_process($js_data);
    $rjs_data = json_decode($js_data);

    echo 'rl_data';
    print_r($rl_data);
    echo 'this is data'."\n";
    print_r($rl_data);
    echo 'this is json_encode'."\n";
    echo $js_data;
    echo 'this is json_decode'."\n";
    print_r($rjs_data);
    // php5 sample end

    // 把 \n \r \t \v 等字元換成 \\n \\r \\t \\v
    function special_character_process($str) {
        $rst_str = '';
        $pattern = '/(\\\\[nrtv])/';
        $replacement = '\\\\$1';
        $subject = $str;
        $rst_str .= preg_replace("$pattern","$replacement","$subject");
        return $rst_str;
    }

    // mysql_close($con);

    // phpinfo();
?>
</textarea>
<script>
    var json_receiver = JSON.parse('<?=$js_data?>');
</script>
