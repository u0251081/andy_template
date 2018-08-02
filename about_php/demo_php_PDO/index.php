<?php
/**
 * Created by PhpStorm.
 * User: andychen
 * Date: 8/2/18
 * Time: 2:04 AM
 */
print '<textarea style="width:1600px; height:900px;">';
$db_driver = 'mysql';
$db_host = 'localhost';
$db_dbname = 'username';
$db_user = 'username';
$db_pwd = 'password';
$dsn = '';
$dsn .= $db_driver . ':';
$dsn .= 'host=' . $db_host . ';';
$dsn .= 'dbname=' . $db_dbname;
$extra[PDO::ATTR_PERSISTENT] = true;
// 如果需要數據庫長連接，需要最後加一個參數 PDO::ATTR_PERSISTENT =＞ true
// e.g. $db = new PDO($dsn, $db_user, $db_pwd, array(PDO::ATTR_PERSISTENT => true));
try {
    $db = new PDO($dsn, $db_user, $db_pwd, $extra);
} catch (PDOException $e) {
    die($e->getMessage());
}
// PDO::exec() 方法會返回一個影響記錄的結果
print 'add data';
$count = $db->exec('insert into some_data values ("02469753","add_title","some_content");') or die(print_r($db->errorInfo(), true));
print $count;
print "\n";
// 這行指令應該得到1的值
print 'foreach:' . "\n";
$sql = "select * from some_data;";
print '$sql = ' . $sql . "\n";
$result = $db->query($sql); // return value type is object
$result->setFetchMode(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    print_r($row);
}
print 'while:' . "\n";
$sql = "select * from some_data;";
print '$sql = ' . $sql . "\n";
$rs = $db->query($sql);
while ($row = $rs->fetch()) {
    print_r($row);
}
print 'fetchAll:' . "\n";
$rs = $db->query($sql);
$rst = $rs->fetchAll();
print_r($rst);
// 設置關聯索引是大寫還是小寫
// $db-＞setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
// PDO::CASE_LOWER 小寫
// PDO::CASE_NATURAL 原始
// PDO::CASE_UPPER 大寫
// 設置返回值的類型
// $result->setFetchMode(PDO::FETCH_ASSOC);
// PDO::FETCH_ASSOC 關聯
// PDO::FETCH_NUM 數字
// PDO::FETCH_BOTH 以上二者
// PDO::FETCH_OBJ 按照對象的形式，類似於以前的 mysql_fetch_object()
print 'PDO::prepare:' . "\n";
$sql = "select * from some_data where id = ? ;";
print '$sql = ' . $sql . "\n";
$rs = $db->prepare($sql);
print 'parse parameter when execute:' . "\n";
print '$rs->execute([$id]);' . "\n";
$rs->execute(['02469753']);
$rs->setFetchMode(PDO::FETCH_ASSOC);
$rst = $rs->fetchAll();
print_r($rst);
$sql = "select * from some_data where id = :id ;";
print '$sql = ' . $sql . "\n";
$rs = $db->prepare($sql);
print 'parse parameter when execute:' . "\n";
print '$rs->execute([\'id\'=>$id]);' . "\n";
$rs->execute(['id' => '02469753']);
$rs->setFetchMode(PDO::FETCH_ASSOC);
$rst = $rs->fetchAll();
print_r($rst);
$id = '02469753';
$sql = "select * from some_data where id = :id ;";
print '$sql = ' . $sql . "\n";
$rs = $db->prepare($sql);
print 'parse parameter use bindValue:' . "\n";
print '$rs->bindValue(\':id\',$id,PDO::PARAM_STR);' . "\n";
print 'if changed variable $id, bound value will not be changed' . "\n";
print '$rs->execute();' . "\n";
$rs->bindValue(':id', $id, PDO::PARAM_STR);
$rs->debugDumpParams(); // use for debug
$rs->execute();
$rs->setFetchMode(PDO::FETCH_ASSOC);
$rst = $rs->fetchAll();
print_r($rst);
$sql = "select * from some_data where id = :id ;";
print '$sql = ' . $sql . "\n";
$rs = $db->prepare($sql);
print 'parse parameter use bindParam:' . "\n";
print '$rs->bindParam(\':id\',$id,PDO::PARAM_STR);' . "\n";
print 'if changed variable $id, bound value will be changed' . "\n";
$rs->bindParam(':id', $id, PDO::PARAM_STR);
$rs->execute(['id' => '02469753']);
$rs->setFetchMode(PDO::FETCH_ASSOC);
$rst = $rs->fetchAll();
print_r($rst);
print 'remove data';
print $db->exec('delete from some_data where id = "02469753";');
print "\n";
print '</textarea>';
/*一般使用fetchColumn()來進行count統計或者某些只需要單字段的記錄很好操作。

　　簡單的總結一下上面的操作:

　　查詢操作主要是PDO::query()、PDO::exec()、PDO::prepare()。PDO::query()主要是用於有記錄 結果返回的操作
，特別是SELECT操作，PDO::exec()主要是針對沒有結果集合返回的操作，
比如INSERT、UPDATE、DELETE等操 作，它返回的結果是當前操作影響的列數。

PDO::prepare()主要是預處理操作，需要通過$rs-＞execute()來執行預處理裡面的SQL 語句，這個方法可以綁定參數，功能比較強大，不是本文能夠簡單說明白的，大家可以參考手冊和其他文檔。
獲取結果集操作主要是：PDOStatement::fetchColumn()、PDOStatement::fetch()、 PDOStatement::fetchALL()。PDOStatement::fetchColumn() 是獲取結果指定第一條記錄的某個字段，缺省是第一個字段。
PDOStatement::fetch() 是用來獲取一條記錄，PDOStatement::fetchAll()是獲取所有記錄集到一個中，獲取結果可以通過PDOStatement:: setFetchMode來設置需要結果集合的類型。

　　另外有兩個周邊的操作，一個是PDO::lastInsertId()和PDOStatement::rowCount()。PDO:: lastInsertId()是返回上次插入操作，主鍵列類型是自動新增的最後的流水號ID。

PDOStatement::rowCount()主要是用於 PDO::query()和PDO::prepare()進行DELETE、INSERT、UPDATE操作影響的結果集，對PDO::exec()方法 和SELECT操作無效。
*/
?>