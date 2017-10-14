<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>prepare statement()删除学生</title>
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
			try{
				$deletesno = $_POST['deletesno'];
				$deteleSQL = "delete from student where sno=?";

				$db = new mysqli('127.0.0.1','root','hua','exp5');
				if($db->connect_errno)
					die($db->connect_error);
				$db->query('SET NAMES "UTF-8"');

				foreach ($deletesno as $dsno) {
					$stmt = $db->prepare($deteleSQL);
					$stmt->bind_param('s',$dsno);
					$stmt->execute();
					$deleteresult = $stmt->get_result();
					if($db->affected_rows == 0)
						echo "sql执行成功，但没有删除到数据";
					else {
						echo "prepare statement()方法删除成功";
						echo "<p>{$dsno}</p>";
					}
				}				
			}catch(Exception $e){
				die($e->getMessage());
			}
			include('show_student.php');
		}		
	 ?>
</div>	
</body>
</html>