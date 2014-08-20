<?php 
		
		require_once('../db_connect.php'); 

		if(isset($_GET['error']) ){
			$error = $_GET['error'];
		} 

		$sql= "SELECT * FROM nav";
		$result= mysql_query($sql);

		$options = "";

		if(mysql_num_rows($result)!=0) {
			while ($row = mysql_fetch_array($result)) {

				$id = $row['id'];
				$name =  $row['name'];
				$options .= "<option value='$id'>$name</option>";
				
			}

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
				<li>
					<a href="admin_art.php" class="at ico">
						<span class="nav-namn">Artiklar</span>
					</a>
				</li>
				<li class="active">
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
			<a href="logout.php" class="btm btm-r ut ico"><span>Logga Ut</span></a>
			<br>

			<form ENCTYPE="multipart/form-data" action="new_action.php" method="POST" autocomplete="off">
				<table>
					<tr>
						<td class="valign"><label for="bild">Bild:</label></td>
						<td><input type="file" name="bild"/></td>
					</tr>
					<tr>
						<td class="valign"><label for="title">Title:</label></td>
						<td><input type="text" name="title" maxlength="30" /></td>
					</tr>
					<tr>	
						<td class="valign"><label for="title">Text:</label></td>
						<td><textarea name="article" value="" cols="30" rows="10"></textarea></td>
					</tr>
					<tr>
						<td class="valign"><label for="page">Kategori:</label></td>
						<td><select name='page'><?php echo $options; ?></select></td>
					</tr>
					<tr>
						<td class="valign"></td>
						<td><input type="submit" value="Spara" class="btm" /></td>
					</tr>
				</table>
			</form>
		</div><!-- end inn -->

		<?php 
				if(isset($error))
				echo "<h4 class='error'>".$error."</h4>"; 
		?>
	</div>
	
</body>
</html>

<?php  } ?>