<?php


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	$db = mysqli_connect("localhost", "root", "", "songs") or die("Error connecting to database: ".mysql_error());

	$raw_results = mysqli_query($db, "SELECT * FROM songs");
	if (!$raw_results){
		die('Invalid query: ' . mysql_error());
	}

	while($results = mysqli_fetch_array($raw_results))
	{
			/*
				$results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			*/


			$artist = $results['artist'];
			$songname = $results['title'];
			$url = $results['url'];
			$separator = '|';
			echo $url.$separator.$artist.$separator.$songname.$separator;
	};
}

?>
