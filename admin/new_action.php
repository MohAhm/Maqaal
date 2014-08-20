<?php 
	
	require_once('../db_connect.php');
	
	$bild = mysql_real_escape_string($_FILES["bild"]["name"]);
	$bildData = mysql_real_escape_string(file_get_contents($_FILES["bild"]["tmp_name"]));
	$bildType = mysql_real_escape_string($_FILES["bild"]["type"]);

	$options = $_REQUEST['page'];
	$nytitle = $_REQUEST['title'];
	$nyarticle = $_REQUEST['article'];

	$datum= time();

	if ($nytitle && $nyarticle) {

		if ($bildData) {

			if (($bildType == "image/jpeg") || ($bildType == "image/jpg") || ($bildType == "image/bmp") || ($bildType == "image/png")) {
				
				$sql = "INSERT INTO articles (title, datum, article, img) VALUES ('$nytitle', '$datum', '$nyarticle', '$bildData')";
				$result = mysql_query($sql);

				$id = mysql_insert_id();

				$sql3 = "INSERT INTO pages(nav_id, article_id) VALUES ('$options', '$id')";
				$result3 = mysql_query($sql3);

				if($result){

					echo "<h2 style='color: #0a0;'>Artikel har skapat... !</h2>";

					header("Refresh:3; url=admin_art.php");

				}else{
				
					echo "Fel i SQL-fråga: ".$sql;
				
				}

			} else {

				$error = urlencode("Bilden måste vara  png, jpeg, jpg eller bmp file!");
				header("Location: new.php?error=$error");			

			}

		} else {

			$error = urlencode("Välja en bild!");
			header("Location: new.php?error=$error");

		}

	} else {

		$error = urlencode("Du skrev inte information!");
		header("Location: new.php?error=$error");	
		
	}	

	require_once('../db_close.php');

?>	