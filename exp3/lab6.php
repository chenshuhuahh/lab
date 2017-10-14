<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>lab6</title>
	<style type="text/css">
		.main {
			width: 300px;
			margin: 0 auto;
			border: 1px solid #ccc;
			padding: 20px 20px 10px 20px;
			font-size: 17px;
		}
		.row {/*每一行*/
			padding-bottom: 5px;
		}
		.first {/*前面的文字*/
			width: 150px;
			display: inline-block;
			text-align: right;
		}	
	</style>
</head>
<body>
	<div class="main">
	<?php 
		echo "<div class='row'> <span class='first'>你的手机号：</span>{$_POST['phone']} </div>";
		echo "<div class='row'> <span class='first'>创建密码：</span>{$_POST['mpassword']} </div>";
		echo "<div class='row'> <span class='first'>昵称：</span>{$_POST['myname']} </div>";	
		echo "<div class='row'> <span class='first'>性别：</span>{$_POST['sex']} </div>";	
		echo "<div class='row'> <span class='first'>所在地：</span>{$_POST['city']} </div>";	
		$cities = array('深圳市'=>'0755', '广州市'=>'020', '上海市'=>'021', '北京市'=>'010', '东莞市'=>'0769', '揭阳市'=>'0663');
		echo "<div class='row'> <span class='first'>所在区号：</span>{$cities[$_POST['city']]} </div>";
		echo "<div class='row'> <span class='first'>手机验证码：</span>{$_POST['textnum']} </div>";	
	?>
	</div>
	
</body>
</html>