<?php 

	session_start();

	require_once('../db_connect.php'); 

	if (!isset($_SESSION['name'])) {

		echo "<h2 style='color: #aa0000;'>Du är inte behörig</h2>";

		header("Refresh:3; url=login.php");

	} else {

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maqaal Admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">  
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/admin.css">
	<link href="../css/normalize.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="meny">
		<h1 class="logo"><img src="../img/logo.png" alt="Logo"></h1>

		<nav>
			<ul >
				<li>
					<a href="../index.php" target="_blank" class="hem ico">
						<span class="nav-namn">Maqaal</span>
					</a>
				</li>
				<li>
					<a href="admin_art.php" class="at ico">
						<span class="nav-namn">Artiklar</span>
					</a>
				</li>
				<li>
					<a href="new.php" class="add ico">
						<span class="nav-namn">Ny artikel</span>
					</a>
				</li>
				<li>
					<a href="admin_user.php" class="user ico">
						<span class="nav-namn">Användare</span>
					</a>
				</li>
				<li>
					<a href="admin_nav.php" class="menu ico">
						<span class="nav-namn">Meny</span>
					</a>
				</li>
			</ul>
		</nav>
	</div><!-- end meny -->

	<div id="content">
		<div class="inn d">		
				<?php 

					$sql = "SELECT * FROM articles WHERE  id='".$_REQUEST['ids']."'" or die('Not connected');
					$result = mysql_query($sql);

					while($row = mysql_fetch_array($result)) {

						$id =$row['id'];
						$title =$row['title'];
						$article =$row['article'];
										
					}	

				?>		

			<form method="POST" action="delete_action.php">
				<h2 style="color: #aa0000;">Är du säker på att vill ta bort den artikel &nbsp;<b>"<?php echo "$title"; ?>"</b></h2>
				<input type="submit" name ="submit" class="btm" value="JA">
				<input type="hidden" name ="ja" value="<?php echo $_REQUEST['ids']; ?>">		
			</form>
		</div><!-- end inn -->
	</div>
	
</body>
</html>

<?php  } require_once('../db_close.php'); ?>