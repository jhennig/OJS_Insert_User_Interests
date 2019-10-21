<?php
$host = 'localhost';
$username = 'OJS_DB_USERNAME';
$password = '';
$name = 'DB_NAME';

$db = new PDO("mysql:host=$host;dbname=$name", $username, $password);

/*
  List of interests with the key being the user_id from OJS.
*/
$interests[31] = array('nonprofit management','organizational capacity','inter-organizational relations','','','','','');
$interests[329] = array('entrepreneurship education','startups','strategic management','social economy','entrepreneurship','','','');
$interests[326] = array('l’évolution des rôles de gestion','gestion du changement','','','','','','');
$interests[31] = array('nonprofit management','organizational capacity','inter-organizational relations','','','','','');
$interests[329] = array('entrepreneurship education','startups','strategic management','social economy','entrepreneurship','','','');



foreach($interests as $key => $val){
	
	$user_id = $key;
	echo "-- USER ID = $user_id ---------------- \n <br>";
	foreach($val as $interest){
		if($interest == "" ){
			break;
		}
		include('insert.php');
		
	}
	echo "-- END USER ---------------- \n <br>";
}







