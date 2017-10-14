<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>删除学生</title>
	<style type="text/css">
		.main {
			width: 1000px;
			margin: auto;
		}
	</style>
</head>
<body>
<div class="main">
	<?php
		if(!isset($_POST['deletesno'])){
			echo "<h3>没有选中学生进行删除</h3>";
			echo "<p><a href='show_student.php'>返回显示全部学生题目界面</a>";
		}
		else{
			$deletesno = $_POST['deletesno'];
			$deletesno_str = implode(",", $deletesno);
			$deteleSQL = "delete from student where sno in ($deletesno_str)";

			$db = new mysqli('127.0.0.1','root','hua','exp5');
			if($db->connect_errno)
				die($db->connect_error);
			$db->query('SET NAMES "UTF-8"');
			$deleteresult = $db->query($deteleSQL);
			if(!$deleteresult)
				die('数据库返回失败');
			if($db->affected_rows == 0)
				echo "sql执行成功，但没有删除到数据";
			else {
				echo "删除成功";
				foreach ($deletesno as $sno) {
					echo "<p>{$sno}</p>";
				}
			}
			include('show_student.php');
		}
		
	 ?>
</div>	
</body>
</html>