<?php
	ini_set("display_errors", 1);
	header("Content-Type:text/html; charset=utf-8");

	$HOST = "localhost";
	$USER = "root";
	$PASSWD = "4321qaz";
	$DB = "shihyi";

	$objPDO = new PDO("mysql:host=".$HOST.";dbname=".$DB, $USER, $PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sQuery = "SELECT * "
			."FROM users;";

	$Statment = $objPDO->prepare($sQuery);
	$Statment->execute();
	$aryData = array();
	if($Statment->rowCount() > 0)
	{
		$aryData = $Statment->fetchAll(PDO::FETCH_OBJ);
	}
	unset($Statment);
	
	$jsonData = new stdClass();
	
	$jsonData->Data = $aryData;

	
	echo json_encode($jsonData);
?>