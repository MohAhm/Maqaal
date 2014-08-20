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
	<link rel="stylesheet" href="../css/bootstrap.css">
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
				<li class="active">
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
		<div class="inn">
			<?php 

				echo "<h2>Inloggad som:&nbsp;".$_SESSION['name']."</h2>";

			 ?>
			
			<a href="logout.php" class="btm btm-r ut ico"><span>Logga Ut</span></a>
			<br><br>
			
			<h2><u>Användare</u></h2>

			<div class="tabler">
				<table>
					<thead>
						<tr>
							<th>Användarnamn</th>
							<th>Lösenord</th>
							<th>Redigera</th>
						</tr>
					</thead>

					<tbody>
						<?php 

							$sql = "SELECT id, uname, pwd FROM users" or die('Not connected');
							$result = mysql_query($sql);

							while($row = mysql_fetch_array($result)) {
		 							
		 						$id =$row['id'];
								$uname =$row['uname'];
								$pwd = $row['pwd'];

								$ic_edit = "<a href=\"editu.php?ids=$id&uname=$uname&pwd=$pwd\">";
								$ic_edit .= "<img src='../img/ic_edit.png' alt='Edit' />";
								$ic_edit .= "</a>";

								echo "<tr>";
								echo "<td><h4>$uname</h4></td>";
								echo "<td><h4>$pwd</h4></td>";
								echo "<td class='img-center action'>$ic_edit</td>";
								echo "</tr>";
										
							}

						?>				
					</tbody>
		 		</table>
			</div><!-- end tabler -->
		</div><!-- end inn -->
	</div>
	
</body>
</html>

<?php  } require_once('../db_close.php'); ?>