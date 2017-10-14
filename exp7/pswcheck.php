<?php	
	header("Content-Type:text/html;charset=UTF-8");
	if($_POST['user']=="" || $_POST['psw']==""){
		header('Location:http://119.29.35.31/mywebs/exp7/login.html');
	}
	else{
		if($_POST['psw']=="123"){
			session_start();
			header('Content-type:text/html;charset=utf-8');
			$_SESSION['user'] = $_POST['user'];
	      	header('Location:http://119.29.35.31/mywebs/exp7/goods.html');
		}
		else{
			echo "密码错误";
			header('Location:http://119.29.35.31/mywebs/exp7/login.html');
		}
	}
	
 ?>