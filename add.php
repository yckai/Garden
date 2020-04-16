<?php
include 'bdd.php';
if(isset($_POST['plants_name']) && !empty($_POST['plants_name']) && isset($_POST['planting_date']) && !empty($_POST['planting_date']))
{
	$bdd->exec('INSERT plants SET plants_name	= "'.$_POST['plants_name'].'"');
	$selectPlants_id=$bdd->query('select plants_id from plants where plants_name = "'.$_POST['plants_name'].'"');			
	while($row = $selectPlants_id->fetch())
	{
		$bdd->exec('INSERT planting_date SET plants_id = "'.$row['plants_id'].'", planting_date = "'.$_POST['planting_date'].'"');
	}
	echo 'Plant '.$_POST['plants_name'].' Successfully added';
}
?>

<html>
	<head>
		<meta charset="utf-8" />

		<link rel="stylesheet" href="style.css">

		<title>Add plant</title>

		<link rel="icon" href="icon.ico" />
	</head>
	<body>
		<div>
			<form  method="post" action="add.php">
				<p>Name of plants</p>
				<input type="text" name="plants_name"/>																
				<p>Planting date</p>
				<input type="text" name="planting_date"/>			
				<br>
				<input type="submit" value="Submit"/>
				<br>
			</form>
		</div>
	</body>
</html>