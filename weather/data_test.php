<?php 

	$content = file_get_contents("weather.json");

	$data = json_decode($content);

	echo '<h1>' . $data->goteborg->location . '</h1>';
	foreach($data->goteborg->forecast as $d) {
		echo $d->date . '&nbsp;';
		echo $d->time . '&nbsp;';
		echo $d->weather . '&nbsp;';
		echo $d->img . '&nbsp;';
		echo $d->temp . '°C<br />';
	}

 ?>