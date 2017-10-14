<?php 
	require('data4.php');//引用封装了数据库访问的代码
	if(isset($_POST['user']) == TRUE){//当有输入的时候就获取表单的内容
		$user = $_POST['user'];
		$psw = $_POST{'psw'};
	}
	if(isset($_POST['remember'])== TRUE){//是否有选择记住一周的复选框
		$isRem = $_POST['remember'];
	}
	if(isset($user) == FALSE){//如果没有输入的话就设置cookie
		$user = $_COOKIE['user'];
		$psw = $_COOKIE['psw'];
	}
	if(isset($user) == FALSE){//如果Cookie中取不到数据就跳回登录界面
		header('Location:lab4-2.html');
	}

	$strSQL = sprintf("Select * From lab4 Where id='%s' And psw='%s'", $user, $psw);

	$myDB = new MyDB();
	$result = $myDB->execSQL($strSQL);

	if ($result->num_rows == 0) {//判断是否有选择出结果集
		header('Content-Type:text/html; charset=UTF-8');
		echo '<p> 输入的用户名或密码不正确！</p>';
		echo '<p><a href="lab4-2.html" target="_self">请重新登录</a></p>';
		exit();
	}
	if(isset($isRem)==TRUE && $isRem == "on"){
		setcookie("user",$user, time()+7*86400,'/','119.29.35.31');
		setcookie("psw",$psw,time()+7*86400,'/','119.29.35.31');
	}
	else {
		setcookie("user","",time()-86400);
		setcookie("psw","",time()-86400);
	}

	$obj = $result->fetch_object();//返回选择中的对象
	$userName = $obj->name;//获取这个对象中的name
	$lastLogin = $obj->time;//获取这个对象中的time

	$result->free_result();//释放结果集资源

	//更新时间
    $strSQL = sprintf("Update lab4 Set time='%s' Where id='%s'", date('Y-m-d H:i:s'), $user);
    $result = $myDB->execSQL($strSQL);
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>lab4-2.php</title>
 	<style type="text/css">
       div {
       		width:450px; 
            margin:100px auto; 
            border: 1px solid #ccc;
            padding: 10px;
       }
              
    </style>
 </head>
 <body>
 	<div>
       <h3>欢迎您
           <?php echo $userName;   ?>
       </h3>
       <p>您上次的登录时间是
          <?php  echo $lastLogin;  ?>
       </p>       
   </div>   
 </body>
 </html>
