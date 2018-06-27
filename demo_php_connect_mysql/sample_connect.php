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
    $database = "username";

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
    echo 'rl_data';
    print_r($rl_data);

?>

<script>
</script>
