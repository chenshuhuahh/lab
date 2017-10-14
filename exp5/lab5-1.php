<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>lab5-1订单</title>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}
		.main {
			width: 350px;
			margin: 50px auto;
			border: 1px solid black;
			padding: 20px 20px 10px 20px;
			font-size: 17px;
		}
		.yourproducts {
			margin: 10px 0;
			padding: 0 0 0 10px;
			border-bottom: 1px solid #ccc;
		}
		.yourprices {
			margin: 10px 0;
			padding: 0 0 0 10px;
		}
		.toright {
			display: inline-block;
			width: 150px;
			text-align: left;
			float: right;
		}
		.row {
			margin: 5px 0;
		}
	</style>
</head>
<body>
	<div class="main">
		<?php  
			echo "<h4>尊敬的用户{$_POST['yourname']} 你购买了以下的商品</h4>";
			echo "<div class='yourproducts'>";
			$commodities = $_POST['produce'];//获取一个数组包含用户的选项
			$money = 0;//计算选择的商品一共多少钱
			//采用数组建立产品序号与产品名称以及产品价格的对应关系
			$prices = array(1=>2.0, 4.0, 3.0, 6.0);
			$produceName = array(1=>"4个100瓦灯泡", 
  		                      "8个100瓦灯泡",  
  		                      "4个100瓦节能灯泡", 
  		                      "8个100瓦节能灯泡");
			//遍历选中的商品
			foreach ($commodities as $choose) {
				echo "<div class='row'>";
				echo "<span>{$produceName[$choose]}</span>";
				printf("<span class='toright'>￥%.2f</span>",$prices[$choose]);
				echo "</div>";
				$money += $prices[$choose];
			}
			echo "</div>";

			echo "<div class='yourprices'>";
			echo "<div>支付方式：{$_POST['ways']}</div>";
			echo "<div class='row'>";
				printf("<span>原价：￥%.2f</span>",$money);
				printf("<span class='toright'>优惠价：￥%.2f</span>",$money*0.7);//打七折
				echo "</div>";
			echo "</div>";
		?>
	</div>
</body>
</html>