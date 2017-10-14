<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>lab4-1.php</title>
	<style type="text/css">
		.main {
			width: 500px;
			margin: auto;
		}
		.smallbox {
			width: 100%;
			margin-bottom: 10px;
			border-bottom: 1px solid #ddd;

		}
	</style>
</head>
<body>
<?php 
	//数组保存能上传的文件类型
	$allowedExts = array("image/gif"=>"gif", 
						"image/jpg"=>"jpg", 
						"image/jpeg"=>"jpeg",
						"image/pjpeg"=>"pjpeg",
						"image/png"=>"png",
						"application/msword"=>"doc",
						"application/pdf"=>"pdf",
						"application/vnd.ms-excel"=>"xls",
						"application/vnd.ms-powerpoint"=>"ppt",
						"application/x-MS-bmp"=>"bmp",
						"text/html"=>"html",
						"application/octet-stream"=>"php",
						"application/x-javascript"=>"js",
						"text/plain"=>"txt"
						);
	//数组保存能图片的文件类型
	$photoExts = array("image/gif"=>"gif", 
						"image/jpg"=>"jpg", 
						"image/jpeg"=>"jpeg",
						"image/pjpeg"=>"pjpeg",
						"image/png"=>"png");

	echo "<div class='main'>";
	// $file = $_FILES['data'];
	$index = 1;
	foreach ($_FILES as $file) {
		echo "<div class='smallbox'>";
		echo '文件',$index++,'<br/>';
		//判断文件是否已经上传
		if(!empty($file['tmp_name'])){
			//判断是否为允许的文件类型并且文件大小不能超过5MB
			if(array_key_exists($file['type'], $allowedExts) && $file['size']<5242880){
				//判断文件是否正确上传
				if ($file['error'] > 0)  {
			     	echo 'Error:', $file['error'], '<br/>';
			  	}
			  	else {
			  		$filename_u = $file['name'];
			  		$filename_g = mb_convert_encoding($filename_u, 'gb2312', 'UTF-8');
				    // echo '文件名称:', $file['name'], '<br/>';
				    // echo '文件类型:', $file['type'], '<br/>';
				    // echo '文件大小:', ($file['size'] / 1024), ' Kb<br/>';
				    // echo '临时文件:', $file['tmp_name'];
				    $filePath_u = 'upload/' . $filename_u;//web文件目录显示
				    $filePath_g = 'upload/' . $filename_g;//windows的中文文件名
				    //将上传的文件移动到新位置
				    move_uploaded_file($file['tmp_name'], $filePath_g);//Windows是gbk编码
				    // echo '文件保存在:',  $filePath;
				    // 如果为图片格式就输出图片
				    if(array_key_exists($file['type'], $photoExts)){
				    	echo '文件名称:', $filename_u, '<br/>';
				    	echo "<p><img src=\"{$filePath_u}\"/></p>";
				    }
				    else {//否则输出超链接
				    	echo "<p><a href=\"{$filePath_u}\">{$filename_u}</a></p>";
				    }
			  	}
			}
		 	else {
		 		echo '<p>非法的文件格式</p>';
		 	}
		}
		else {
			echo '<p>未上传文件</p>';
		}
		echo '</div>';
	 }
	echo '</div>';  

 ?>
</body>
</html>




