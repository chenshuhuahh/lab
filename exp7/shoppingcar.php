<?php
	session_start();
	//用于存储商品名称
	$productNames = array("ipad"=>"iPad", "notebook"=>"笔记本","camera"=>"数码相机", "iphone"=>"iPhone");
	//用于存储商品价格
	$productPrices = array("ipad"=>3000, "notebook"=>4000, "camera"=>2000,"iphone"=>3500);
	//判断购物车是否存在
	if(isset($_SESSION['car'])){
		$cars=$_SESSION['car']; //从$_SESSION['car']中取出
	}
	else{
		$cars=array();  //不存在就构建一个新数组
	}
	$status=$_REQUEST['status'];//取出操作
	$title = '购物车已增加：';  
	//判断是否为添加
	if(isset($_GET["product"])==true && $status=="add"){
		$product=$_GET["product"];//取出传入的物品的id
		if(array_key_exists($product,$cars)==true){
			$cars[$product]++; //已存在，就加
		}
		else{
			$cars[$product]=1;//不存在，就设置1
		}
	}
	//判断是否为修改
	if($status=="modify"){
		$pro_num=$_POST['number'];   //取出物品数量的name
		$count=0;
		foreach($cars as $key=>$value){ 
			if($pro_num[$count]==0){   //若商品数量为0，则去除
				unset($cars[$key]); 
			}
			else{
				$cars[$key]=$pro_num[$count];
			}
			$count++;
		}
		$title = '购物车已修改：';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>购物车</title>
	</head>
	<style type="text/css">
		*{margin: 0; padding: 0;}
		.contain{
			width: 400px;
			border: 1px solid #ccc;
			padding: 20px;
			margin: 50px auto;
		}
		h3 {
			margin-bottom: 15px;
		}
		table{
			width: 400px;
			border-collapse: collapse;
		}
		td,th{
			border-bottom:1px dotted #ccc;
			padding: 12px;
		}
		th:first-child,td:first-child{
			width: 150px;
			text-align: left;
		}
		th:nth-child(2),td:nth-child(2){
			width: 80px;
			text-align: center;
		}
		th:last-child,td:last-child{
			width: 100px;
			text-align: center;
		}
		#solid{
			border-top: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
		}
		#quantity{
			width: 30px;
			background: #ddd;
			box-shadow: 1px;
		}
		p {
			margin-top: 15px;
		}
	</style>
	<body>
		<div class="contain">
			<div class="top">
				<h3>尊敬的用户<?php echo '“' ,$_SESSION['user'],'”,',$title ?></h3>
				<hr />
			</div>
			<div class="main">
				<table>
					<tr>
						<th>产品名称</th>
						<th>价格</th>
						<th>数量</th>
					</tr>
					<form action="shoppingcar.php?status=modify" method="post">
					<?php
						foreach($cars as $key=>$value){
							echo '<tr><td>',$productNames[$key],'</td>',
								'<td>￥',$productPrices[$key],'</td>',
								'<td><input type="text" id="quantity" name="number[]" value=',$value,'></td></tr>';
							}
							
							$_SESSION['car']=$cars;
							$prices=0;
							$numbers=0;
							foreach($cars as $key=>$value){
								$prices+=$value*$productPrices[$key];
								$numbers+=$value;
							}
					?>
					<tr>
						<th id="solid">总价</th>
						<th id="solid">
							<?php
								echo '￥',$prices;
								?>
						</th>
						<th id="solid">
							<?php
								echo $numbers;
								?>
						</th>
					</tr>
				</table>
			</div>
			<div class="footer">
				<p>
					<a href="goods.html">继续购物</a>
					<input type="submit" value="修改购物车" />
				</p>
			</div>
			</form>
		</div>
	</body>
</html>