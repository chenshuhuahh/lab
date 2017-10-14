<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>exp4</title>
	<style type="text/css">
	* {
		font: 20px "Microsoft Yahei";
	}
	</style>
</head>
<body>
	<?php 
		$str = "<p>The Quick Brown Fox.</p>";
		printf($str);

		$change = strtolower($str);
		$change = str_replace("brown", "red", $change);
		printf($change);

		//1.不要p标签和句点
		$change_first=substr($change,3,strlen($change)-5);
		//2.用空格分割字符串 分成4小段 
		$change_second=explode(' ',$change_first);
		for($i=0; $i<sizeof($change_second); $i++){
			// 3.对每一段进行加密算法
			$change_third=encrypt($change_second[$i]);
			if($i<sizeof($change_second)-1)
				echo "$change_third ";
			else
				echo "$change_third.";
		}
		//加密算法 将ASCⅡ码表中的小写字母（97~122）循环移动5位 进行加密
		function encrypt($small){
			//依次取出各个字符
			for($j=0; $j<strlen($small); $j++){
				$each=ord($small[$j])+5; 
				if($each>=97 && $each<=122){
					$back=chr($each);
					echo $back;
					}
				elseif($each>122){//当超出小写字母范围的时候，需返回
					$back=chr(97+(($each)-122)-1);
					echo $back;
				}
			}
		}		
	 ?>
</body>
</html>