<?php  

	$link = mysql_connect('localhost', 'mohahmco_momo', 'FLgym99');

	if(!$link) {
		die('Not connected: ' . mysql_error());

	} 

	$db_selected = mysql_select_db('mohahmco_maqaal', $link);

		if(!$db_selected){
			die('can\'t use maqaal : ' . mysql_error());

		}

	mysql_set_charset ('utf8');

 ?>