<?php 
 
	require_once('db_connect.php');

	$img_id = $_GET['id'];

	$sql = "SELECT img FROM articles WHERE id='$img_id'";
	$result = mysql_query($sql);

	if($result) {
		$row = mysql_fetch_array($result);

		header("Content-type: image/jpeg");
		echo $row['img'];
	}

	require_once('db_close.php');

 ?>