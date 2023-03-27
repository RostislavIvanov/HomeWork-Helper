<?php 
$connect_data = "host=localhost port=5432 user=postgres dbname=tipovoy_raschet password=";
$connect = pg_connect($connect_data);

if (!$connect) {
	die('Error connect to database');
}


?>