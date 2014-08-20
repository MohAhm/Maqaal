<?php 

	$link2 = mysql_close($link);

	if (!$link2){

		echo "<p>Kan inte avbryta kontakten med databasservern! <p>";

		exit();

	}

 ?>