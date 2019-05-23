<?php
	require_once("../../banco/config.php");
	$idcliente=$_POST["idcliente"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM `cliente` WHERE id_cliente=?";
	$q=$pdo->prepare($sql);
	$q->execute(array($idcliente));
	Database::disconnect();
	$success = "success";
	echo json_encode(array("success" => $success));

	
?>