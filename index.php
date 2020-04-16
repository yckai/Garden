<?php
	include 'bdd.php';
	echo '<html><head><meta charset="utf-8" /><link rel="stylesheet" href="style.css"><title>Manage plant</title><link rel="icon" href="icon.ico" /></head><body><div>';
	$allPlants=$bdd->query('SELECT plants.plants_name,watering.watering_amount, watering.watering_date,fertilizer.fertilizer_amount, fertilizer.fertilizer_date FROM plants INNER JOIN watering ON plants.plants_id = watering.plants_id INNER JOIN fertilizer ON plants.plants_id = fertilizer.plants_id where 1 ORDER by plants.plants_name desc, watering.watering_date desc LIMIT 50 ');
	while($result=$allPlants->fetch())
	{
		echo ''.$result[0].' '.$result[1].' '.$result[2].' '.$result[3].' '.$result[4].'<br>';
	}
	echo '</div></body></html>';
?>
