<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>lab5</title>
	<style type="text/css">
		table {
			width: 700px;
			margin: auto;
			border-collapse: collapse;
			text-align: center;
		}
		th, td {
			width: 70px;
			border: 1px solid black;
		}
		th:nth-child(1), tr:nth-child(1){
			color: red;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<table border="1">
		<caption>乘法口诀表</caption>
		<tr>
			<th>×</th>
			<th>1</th>
			<th>2</th>  
			<th>3</th>
			<th>4</th>
			<th>5</th>
			<th>6</th>
			<th>7</th>
			<th>8</th>
			<th>9</th>
		</tr>
		<?php 
		     for ($i=1; $i<=9; $i++){
		     	echo "<tr>";
		     	echo "<th>$i</th>";
		     	for ($j=1; $j<=$i ; $j++) { 	     		
		     		$result = $i*$j; 
					echo "<td>$i*$j=$result</td>";		     		     	
				}
				for ($k=1; $k<=10-$j ; $k++) { 
					echo "<td>&nbsp</td>";
				}
				echo "</tr>";
		     }
		      	
		 ?>

	</table>
</body>
</html>