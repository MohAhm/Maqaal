<?php  
	
	require_once('../db_connect.php'); 

	$id = $_REQUEST['id'];
	$edtitle = $_REQUEST['edtitle'];
	$edarticle = $_REQUEST['edarticle'];

	mysql_query("UPDATE articles SET title='$edtitle', article='$edarticle'	WHERE id='$id'");

	echo "<h2 style='color: #0a0;'>Artikeln har uppdaterat!</h2>";

	header("Refresh:3; url=admin_art.php");

	require_once('../db_close.php');

 ?>