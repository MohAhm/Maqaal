<?php 

	session_start();

	require_once('../db_connect.php'); 

	if (!isset($_SESSION['name'])) {

		echo "<h2 style='color: #aa0000;'>Du är inte behörig</h2>";

		header("Refresh:3; url=login.php");

	} else {

 ?>
<!doctype html>
<html lang="sv">
<head>
	<meta charset="UTF-8">
	<title>Maqaal Admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">  
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/admin.css">
	<link href="../css/normalize.css" rel="stylesheet" type="text/css">

	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
			selector: "textarea",
			width : 1000,
			height : 250
		});
	</script>
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
				<li >
					<a href="admin_nav.php" class="menu ico">
						<span class="nav-namn">Meny</span>
					</a>
				</li>
			</ul>
		</nav>
	</div><!-- end meny -->

	<div id="content">
		<div class="inn">
			<a href="logout.php" class="btm btm-r ut ico"><span>Logga Ut</span></a>
			<br>

			<form ENCTYPE="multipart/form-data" action="edit_action.php" method="POST" autocomplete="off">
				<table>
					<tr>
						<td class="valign"><label for="title">Title:</label></td>
						<td><input type="text" maxlength="30" name="edtitle" value="<?php echo $_REQUEST['titles']; ?>"></td>
					</tr>
					<tr>	
						<td class="valign"><label for="title">Text:</label></td>
						<td><textarea name="edarticle" value="" cols="30" rows="10"><?php echo $_REQUEST['articles']; ?></textarea><br></td>
					</tr>
					<tr>
						<td class="valign"></td>
						<td><input type="submit" value="Spara" class="btm" />
						<input type="hidden" name="id" value="<?php echo $_REQUEST['ids']; ?>"></td>
					</tr>
				</table>
			</form>
		</div><!-- end inn -->
	</div>
	
</body>
</html>

<?php  } require_once('../db_close.php'); ?>