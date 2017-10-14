<?php
	sleep(2);//睡2秒
	$users = ['tom','jack','admin'];
	// header("Content-Type:text/plain;charset=utf-8");
	$data = $_GET['user'];
	if(in_array($data,$users)){
		echo 0;//表示这个名字已经存在
	}else{
		echo 1;
	}
?>