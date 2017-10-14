<?php
$data = file_get_contents ( "data.txt" );
$votes = explode ( ",", $data );
if (isset ( $_GET ['flower'] )) {
	$flower =  (int)$_GET ['flower'];
	if (count( $votes )>=$flower+1 && $flower>=0) {
		$votes[$flower] ++;
	}
}
$data = implode ( ",", $votes );
file_put_contents ( "data.txt", $data );
echo $data;
?>