<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Xin-an
 * Date: 2018/7/30
 * Time: 下午 07:51
 */
if(!isset($_POST['click']))$click = 0;
else $click = $_POST['click'];
//如果使用者點了按鈕，就載進檢查驗證碼的檔案
if($click)include("checkForm.php");
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>M1</title>
	</head>
	<body>
		<div>
        	<div>
        		驗證碼如下：
        	</div>
        	<div>
        	    <!--樓下是圖形驗證碼-->
        	    <!--沒看錯，就是這樣用，把它當圖片使用-->
        		<img src="checkCode.php">
        	</div>
        	<div>
        		<form action="index.php" method="post">
        		    <!--樓下這一句是為了確認使用者點了提交按鈕-->
        			<input type="hidden" name="click" value="1">
                    <!--樓下是使用者輸入驗證碼的地方-->
        			<input type="text" name="checkCode">
        			<!--樓下是提交按鈕-->
        			<button type="submit" value="submit">提交</button>
        		</form>
        	</div>
        </div>
	</body>
</html>