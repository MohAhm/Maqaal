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
	<link href="../css/normalize.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../css/admin.css">
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
				<li class="active">
					<a href="admin_art.php" class="at ico">
						<span class="nav-namn">Artiklar</span>
					</a>
				</li>
				<li>
					<a href="new.php" class="add ico">
						<span class="nav-namn">Ny artikel</span>
					</a>
				</li>
				<li >
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
			
			<h2><u>Artiklar</u></h2>
			
			<div class="tabler">
				<table>
					<thead>
						<tr>
							<th>Datum</th>
							<th>Title</th>
							<th>Redigera</th>
							<th>Radera</th>
						</tr>
					</thead>

					<tbody>
						<?php 
							
							$per_page = 5;
	
							$pages_query = mysql_query("SELECT COUNT('id') FROM articles");
							$pages = ceil(mysql_result($pages_query, 0) / $per_page);

							$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
							$start = ($page - 1) * $per_page;


							$sql = "SELECT * FROM articles ORDER BY datum DESC LIMIT $start, $per_page " or die('Not connected');
							$result = mysql_query($sql);

							while($row = mysql_fetch_array($result)) {

								$id =$row['id'];
								$datum = $row['datum'];
								$title =$row['title'];
								$article =$row['article'];
								
								$ic_edit = "<a href=\"edit.php?ids=$id&titles=$title&articles=$article\">";
								$ic_edit .= "<img src='../img/ic_edit.png' alt='Edit' />";
								$ic_edit .= "</a>";

								$ic_delete = "<a href=\"delete.php?ids=$id&titles=$title&articles=$article\">";
								$ic_delete .= "<img src='../img/ic_delete.png' alt='Delete' />";
								$ic_delete .= "</a>";

								echo "<tr>";
								echo "<td class='img-center action'>".date('M d', $datum)."</td>";
								echo "<td><h4>$title</h4></td>";
								echo "<td class='img-center action'>$ic_edit</td>";
								echo "<td class='img-center action'>$ic_delete </td>";
								echo "</tr>";
										
							}	

						?>			
					</tbody>
		 		</table>
			</div><!-- end tabler -->
			
			<ul class="pagination">
				<?php 

			 		$f = $page - 1;
					$n = $page + 1;
					
					$ic_f = "<li class='disabled'><a href='admin_art.php?page=$f'>";
					$ic_f .= "<img src='../img/arwl.png' alt='' />";
					$ic_f .= "</a></li>";

					$ic_n = "<li class='disabled'><a href='admin_art.php?page=$n'>";
					$ic_n .= "<img src='../img/arw.png' alt='' />";
					$ic_n .= "</a></li>";

								
					if(!($page<=1))

						echo $ic_f;

					if($pages >= 1){

						for($x=1;$x<=$pages;$x++){

								echo ($x == $page) ? '<li class="active"><a href="?page='.$x.'">'.$x.'<span class="sr-only"></span></a></b>' : '<li class="disabled"><a href="?page='.$x.'">'.$x.'</a></li>';
																																		
						}
					}

					if(!($page>=$pages))

						echo $ic_n;			

			 	?>
			 </ul><!-- 	end pagination -->
		</div><!-- end inn -->
	</div>
	
</body>
</html>

<?php  } require_once('../db_close.php'); ?>