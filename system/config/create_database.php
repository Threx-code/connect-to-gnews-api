<?php

/*
================================================================================================================================================================================================================================================

												RUN THIS FILE FIRST

================================================================================================================================================================================================================================================
*/



$host = 'localhost';
$root = 'root';
$root_password = '';


$db = 'mtech_db';


$options = array(PDO::ATTR_PERSISTENT=>TRUE, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
try{
	$dbh = new PDO('mysql:host='.$host, $root, $root_password, $options);
	$dbh->exec("CREATE DATABASE `$db`");
}
catch(PDOException $e){
	exit("DB ERROR: ".$e->getMessage());
}

?>