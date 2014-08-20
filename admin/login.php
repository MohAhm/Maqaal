<?php 

	if(isset($_GET['error']) ){
		$error = $_GET['error'];
	} 

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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<div id="content-login">
		<div id="login-form" class="lo">	
			<form method="POST" action="formhandler.php">
				<h1 class="logo-login"><img src="../img/logo3.png" alt="Logo"></h1>

				<p>
					<label for="uname" class="lo">Användarnamn:</label>
					<input type="text" name="name" class="form-with" maxlength="15" autocomplete="off" autofocus />
				</p>

				<p>
					<label for="pwd" class="lo">Lösenord:</label>
					<input type="password" name="password"  class="form-with" maxlength="15" autocomplete="off" />
				</p>
				
				<input type="submit"  name="submit" value="Logga in" class="btm log" />
			</form>

			<?php 

				if(isset($error))
				echo "<h4 class='error'>".$error."</h4>";

			?>
		</div>	
	</div>
	
</body>
</html>

