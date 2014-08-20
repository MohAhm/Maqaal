<!doctype html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<title>Vädret</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link rel="stylesheet/less" type="text/css" href="css/style.less" />
	<script type="text/javascript" src="less-1.7.0.min.js"></script>
</head>

<body id="bg">   
	<div id="content">
		<?php 

			$content = file_get_contents("weather.json");

			$data = json_decode($content);

		?>

		<header>
			<div class="logo">Vädret</div>
		</header>

		<div class="location grupp">
			<?php

				echo '<h3 class="heading">' . $data->stockholm->location . '</h3>';  

				foreach($data->stockholm->forecast as $d) {
					echo '<section>';
					echo '<span>'.$d->date . '<br>';
					echo $d->time . '</span>';		
					echo $d->img;
					echo '<h4>'.$d->temp . '<sup class="temp">°C</sup></h4>';
					echo '</section>';
				}

			?>		
		</div><!-- end location -->



		<div class="location grupp">
			<?php 

				echo '<h3 class="heading">' . $data->malmo->location . '</h3>'; 

				foreach($data->malmo->forecast as $d) {
					echo '<section>';
					echo '<span>'.$d->date . '<br>';
					echo $d->time . '</span>';		
					echo $d->img;
					echo '<h4>'.$d->temp . '<sup class="temp">°C</sup></h4>';
					echo '</section>';
				}

			?>		
		</div><!-- end location 2 -->



		<div class="location grupp">
			<?php 

				echo '<h3 class="heading">' . $data->goteborg->location . '</h3>'; 

				foreach($data->goteborg->forecast as $d) {
					echo '<section>';
					echo '<span>'.$d->date . '<br>';
					echo $d->time . '</span>';			
					echo $d->img;
					echo '<h4>'.$d->temp . '<sup class="temp">°C</sup></h4>';
					echo '</section>';
				}

			?>		
		</div><!-- end location 3 -->
	</div><!-- end content -->
</body><!-- end bg -->
</html>
