<?php 

	require_once('../db_connect.php');

	$id = $_REQUEST['id'];
	$edname = $_REQUEST['edname'];
	$edtitle = $_REQUEST['edtitle'];

	if ($edname && $edtitle) {

		mysql_query("UPDATE nav SET name='$edname', title='$edtitle' WHERE id='$id'");

		echo "<h2 style='color: #0a0;'>Meny har uppdaterat!</h2>";

		header("Refresh:3; url=admin_nav.php");

	} else {

		echo "<h2 style='color: #a00;'>Du skrev inte Namn eller Title!</h2>";

		header("Refresh:2; url=admin_nav.php");

	}
	

	require_once('../db_close.php');

 ?>