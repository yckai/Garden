<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=plantes;charset=utf8', '<user>', '<password>', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
}
//renvoie erreur si aucune connection possible
catch (Exception $e)  
{
        die('Erreur : ' . $e->getMessage());   
}
ini_set("display_errors",0);error_reporting(0);

?>
