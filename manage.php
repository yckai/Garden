<?php
	include 'bdd.php';
	echo '<html><head><meta charset="utf-8" /><link rel="stylesheet" href="style.css"><title>Manage plant</title><link rel="icon" href="icon.ico" /></head><body><div>';
	echo '<form	method="post" action="manage.php">';	
	$allPlants=$bdd->query('select * from plants where 1');
	echo '<div><form  method="post" action="add.php">';
	while($result=$allPlants->fetch())
	{
		echo $result[1];
		echo '<input type="hidden" value="'.$result[0].'" name ="plants_id'.$result[0].'">';
		echo '<input type="text" value="0" name ="watering_amount'.$result[0].'">';
		echo '<input type="date" id="start" name="watering_date'.$result[0].'" value="'.date("Y-m-d").'" min="1996-01-01" max="2100-12-31">';
		echo '<input type="text" value="0" name ="fertilizer_amount'.$result[0].'">';
		echo '<input type="date" id="start" name="fertilizer_date'.$result[0].'" value="'.date("Y-m-d").'" min="1996-01-01" max="2100-12-31">';
		echo '<input type="text" value="" name ="comment_content'.$result[0].'"><br>';
		
	}
	echo '<input type="hidden" value="ok" name="select_plant_ok"/>';
	echo '<br><input type="submit" value="Validate"/><br></form></div>';
	if(isset($_POST['select_plant_ok']) && !empty($_POST['select_plant_ok']) && $_POST['select_plant_ok'] == 'ok')
	{
		$countPlants=$bdd->query("SELECT COUNT(*) as plants_id FROM plants");
		$donnees = $countPlants->fetch();
		$countPlants->closeCursor();
		echo $donnees['plants_id'];
		foreach (range(1, $donnees['plants_id']) as $number)
		{
			$watering_amount = $_POST['watering_amount'.$number.''];
			$watering_date = $_POST['watering_date'.$number.''];
			$fertilizer_amount = $_POST['fertilizer_amount'.$number.''];
			$fertilizer_date = $_POST['fertilizer_date'.$number.''];
			$comment_content = $_POST['comment_content'.$number.''];
			
			$bdd->exec('INSERT watering SET plants_id = "'.$number.'", watering_amount = "'.$watering_amount.'", watering_date = "'.$watering_date.'"');
			$bdd->exec('INSERT fertilizer SET plants_id = "'.$number.'", fertilizer_amount = "'.$fertilizer_amount.'", fertilizer_date = "'.$fertilizer_date.'"');
			if ($_POST['comment_content'.$number.''] != '')
			{
				$bdd->exec('INSERT comment SET plants_id = "'.$number.'", comment_content = "'.$comment_content.'"');
			}
		}
	}
	echo '</div></body></html>';
?>
