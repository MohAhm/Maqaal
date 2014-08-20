<?php

	require_once('../db_connect.php');
	
	mysql_query("DELETE FROM articles WHERE id='".$_REQUEST['ja']."'");
	
	echo "<h2 style='color: #00aa00;'>Artikeln har tagits bort!</h2>";
	
	header("Refresh:3; url=admin_art.php");
	
	require_once('../db_close.php');
	
?>