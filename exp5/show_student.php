<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>显示全部学生题目</title>
	<style type="text/css">
		.main {
				width: 1000px;
				margin: auto;
			}
		table {
			/*width: 700px;*/
			/*margin: auto;*/
			border-collapse: collapse;
			text-align: center;
		}
	/*	th, td {
			width: 100px;
		}*/
		table, td, th, tr {
  			border:1px solid black;
  		}
  		tr {
  			height: 40px;
  		}
  		tr:nth-child(1) {
  			color: red;
  			background-color: #d9d919;
  		}
  		tr:nth-child(2n) {
  			background-color: #93db70;
  		}
  	/*	tr:nth-child(2n-1) {
  			background-color: yellow;
  		}*/
  		th:nth-child(3){
  			width: 150px;
  		}
  		th:nth-child(4), th:nth-child(8) {
  			width: 100px;
  		}
  		th:nth-child(5) {
  			width: 300px;
  		}
  		th:nth-child(6) {
  			width: 200px;
  		}
  		th:nth-child(1), th:nth-child(2), th:nth-child(7) {
  			width: 60px;
  		}
  		button {
  			margin-left: 20px;
  		}
	</style>
</head>
<body>
<div class="main">
	<form action="delete_student.php" method="post">
		<?php 
			$db = new mysqli('127.0.0.1','root','hua','exp5');
			if($db->connect_errno)
				die($db->connect_error);
			$db->query('SET NAMES "UTF-8"');
			$selectSQL = "Select * from student order by sno";
			$selectresult = $db->query($selectSQL);

			$num_student = $selectresult->num_rows;
			echo "<p>学生数为：{$num_student}</p>";
			// if($num_student!=0){
			echo "<table>";
			echo "<tr>";
			echo "<th>delete</th>";
			echo "<th>num</th>";
		    echo "<th>sno</th>";
		    echo "<th>name</th>";
		    echo "<th>title</th>";
		    echo "<th>last_time</th>";
		    echo "<th>state</th>";
		    echo "<th>partner</th>";
		    echo "</tr>"; 
		    $count = 1;
			while ($line = $selectresult->fetch_assoc()) {        
			    echo '<tr>';
			    echo '<td><input type="checkbox" name="deletesno[]" value="',$line['sno'],'"</td>';
			    echo "<td>{$count}</td>";
			    $count++;
			    echo "<td>{$line['sno']}</td>";
			    echo "<td>{$line['name']}</td>";
			    echo "<td>{$line['title']}</td>";
			    echo "<td>{$line['last_time']}</td>";
			    echo "<td>{$line['state']}</td>";
			    echo "<td>{$line['partner']}</td>";
			    // foreach ($line as $col_value) 
			    //     echo "<td>{$col_value}</td>";
			    echo '</tr>';
			}
			echo "</table>";
			// }
			
			echo "<p><a href='index.html'>返回输入界面</a>";
			echo "<button type='submit'>确定删除</button></p>";
		 ?> 
	</form>
</div>
</body>
</html>