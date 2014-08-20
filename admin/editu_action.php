<?php 

	require_once('../db_connect.php');

	$id = $_REQUEST['id'];
	$eduname = $_REQUEST['eduname'];
	$edpwd = $_REQUEST['edpwd'];

	if ($eduname && $edpwd) {

		if (strlen($edpwd) >= 5) {

			mysql_query("UPDATE users SET uname='$eduname' WHERE id='$id'");

			$md5 = md5($edpwd);

			mysql_query("UPDATE users SET pwd='$md5' WHERE id='$id'");

			echo "<h2 style='color: #0a0;'>Användare har uppdaterat!</h2>";

			header("Refresh:3; url=admin_user.php");

		} else {

			echo "<h2 style='color: #a00;'>Lösenordet måste vara mer än 5 tecken!</h2>";

			header("Refresh:3; url=admin_user.php");

		}

	} else {

		echo "<h2 style='color: #a00;'>Du skrev inte Användarnamn eller Lösenord!</h2>";

		header("Refresh:3; url=admin_user.php");

	}

	require_once('../db_close.php');

 ?>