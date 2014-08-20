<?php  
	
	echo "<h3><u>Sök Resultat:</u></h3>";

	require_once('db_connect.php');

	$query = $_GET['s'];

	$min_legth = 1;

	if(strlen($query) >= $min_legth) {

		$query = htmlspecialchars($query);

		$query = mysql_real_escape_string($query);

		
		$raw_results = mysql_query("SELECT id, title, datum, LEFT(article, 150) AS excerpt, article 
						FROM articles WHERE(title LIKE '%".$query."%') OR (article LIKE '%".$query."%')") or die(mysql_error());
		$num = mysql_num_rows($raw_results);

		if($num > 0) {
				
			if ($num == 1) {

				echo "<h3>sökning efter <b>$query</b> hittades på <b>$num</b> sida!</h3>";

			} else {

				echo "<h3>sökning efter <b>$query</b> hittades på <b>$num</b> sidor!</h3>";

			}				 

				echo "<hr />";


			while($row = mysql_fetch_array($raw_results)) {

				$excerpt = $row['excerpt'];

				$space = strrpos($excerpt, ' ');

				$id = $row['id'];
				$datum = $row['datum'];
				$title =$row['title'];
				$article =$row['article'];

				echo "<h3><a href='article.php?article=$id'>$title</a><br /><small>";
				echo date('M d, Y', $datum);
				echo "</small></h3>";
				echo substr($excerpt, 0, $space).'...'."<a class='las' href='article.php?article=$id' title='läs mer'>Läs mer</a>";
				echo "<hr />";

			}

		} else {

			echo "<h3>Inga resultat hittades för <b>$query</b></h3>";

		}
		
	}

	require_once('db_close.php');

 ?>