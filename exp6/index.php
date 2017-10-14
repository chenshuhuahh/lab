<?php
   include 'validate.php';//函数在文件中
   $checks = array('sno', 'name', 'psw', 'title', 'partner');
   if (ValidatePost($checks) == false)   {
       include('error.html');
       die;//退出下文处理
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新增或修改题目</title>
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
		// if(isset($_POST['sno']) == TRUE){
		$sno = $_POST['sno'];
		$name = $_POST['name'];
		$psw = $_POST['psw'];
		$title = $_POST['title'];
		$partner = $_POST['partner'];
		$action = $_POST['action'];
		$last_time = date('Y-m-d H:i:s');
	
	
		$db = new mysqli('127.0.0.1','root','hua','exp5');
		if($db->connect_errno)
			die($db->connect_error);
		$db->query('SET NAMES "UTF-8"');
		$insertSQL = "insert into student(sno, name, psw, title, last_time, partner) values('$sno', '$name', '$psw', '$title', '$last_time', '$partner')";

		$updateSQL = sprintf("update student set title='%s' where sno='%s' and psw='%s'", $title, $sno, $psw);
		if($action=='add') {
			$addresult = $db->query($insertSQL);
			$addres = $db->affected_rows;
			if(!$addresult || !$addres) {
				echo "Failure,data cannont been inserted!该学号已存在";
				echo "<p><a href='index.html'>返回输入界面</a>";
			}
			
			else{
				echo "Success!Data is successfully inserted!";
				include('show_student.php');
			}
		}
		if($action=='modify') {
			$modresult = $db->query($updateSQL);
			$modres = $db->affected_rows;
			if(!$modresult || !$modres) {
				echo "Failure,title cannont been changed!";
				echo "<p><a href='index.html'>返回输入界面</a>";
			}
			else{
				echo "Success!title is successfully changed!";
				include('show_student.php');
			}
		}
 	?>
 	</div>
</body>
</html>
