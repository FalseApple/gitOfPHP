<?php
	ini_set("display_errors", 1);
	header("Content-Type:text/html; charset=utf-8");

	$objFP = fopen('php://input', 'r');
	$postData = stream_get_contents($objFP);
	$jsonData = json_decode($postData);

	$HOST = "localhost";
	$USER = "root";
	$PASSWD = "4321qaz";
	$DB = "shihyi";

	
	$objPDO = new PDO("mysql:host=".$HOST.";dbname=".$DB, $USER, $PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sQuery = "INSERT INTO `users`(`Name`, `passwd`) VALUES('".$jsonData->Name."', '".$jsonData->passwd."');";
	
	$Statment = $objPDO->prepare($sQuery);
	$Statment->execute();

	
	echo json_encode($jsonData);
?>