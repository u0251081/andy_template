<textarea id="cli_rst" style="width: 800px; height: 450px;" disabled></textarea>
<?php
    $php_info = '';
	$php_info .= 'hello world'."\\n";
	$php_info .= 'Trying to connect mysql'."\\n";
	$hostname = "sql209.byethost15.com";
    $username = "b15_22349437";
    $password = "a123932";
    $database = "b15_22349437_db";
    $servername = $hostname;
	$php_info .= 'Use Hostname: '.$hostname."\\n";
	$php_info .= 'Use Username: '.$username."\\n";
    $con = mysql_connect($servername,$username,$password);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    } else {
        $php_info .= 'connect success'."\\n";
    }
    mysql_query('set names utf8');
	$php_info .= 'Use Database: '.$database."\\n";
    mysql_select_db("$database");

    $my_data = mysql_query('status');
    while( $cur_row = mysql_fetch_array($my_data)) {
        $rl_data[] = $cur_row;
    }

    mysql_close($con);

    # include jQuery 3.3.1
    echo '<script src="/assets/js/jquery-3.3.1.js" type="text/javascript" ></script>';
?>
<script>
    var php_info = '<?=$php_info?>';
    // document.getElementById('cli_rst').innerText = php_info;
    $('#cli_rst').text(php_info);
</script>