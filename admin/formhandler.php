<?php
	
	session_start();
	
	if ($_POST) {
	
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['password'] = md5($_POST['password']);
		
		if ($_SESSION['name'] && $_SESSION['password']) {
		
			require_once('../db_connect.php');
			
			$query = mysql_query("SELECT * FROM users WHERE uname='".$_SESSION['name']."'");
			$numrows = mysql_num_rows($query);
			
			if ($numrows != 0) {
			
				while ($row = mysql_fetch_assoc($query)) {
				
					$dbname = $row['uname'];
					$dbpassword = $row['pwd'];
					
				}
				
				if ($_SESSION['name'] == $dbname) {
				
					if($_SESSION['password'] == $dbpassword) {
						
						$expire = time()-900;
						setcookie('maqaal', $_POST['name'], $expire);
						
						header("location: admin_art.php");
						
					} else {
					
						$error = urlencode("Du angav fel lösenord!&nbsp; Försök igen.");
						header("Location: login.php?error=$error");
						
					}
					
				} else {
				
					$error = urlencode("Du angav fel användarnamn!&nbsp; Försök igen.");
					header("Location: login.php?error=$error");
				
				}
				
			} else {
			
				$error = urlencode("Du är inte behörig!");
				header("Location: login.php?error=$error");
				
			}
			
		} else {
			
			$error = urlencode("Du skrev inte användarnamn eller lösenord!");
			header("Location: login.php?error=$error");
			
		}
		
	} else {
	
		echo "<h2 style='color: #a00;'>Du är inte behörig</h2>";
		header("Refresh:3; url=login.php");
		exit;
		
	}
	
?>