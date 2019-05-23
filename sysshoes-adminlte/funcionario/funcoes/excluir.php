<?php
	require_once("../../banco/config.php");
	$iduser=$_POST["iduser"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM `user` WHERE id_user=?";
	$q=$pdo->prepare($sql);
	$q->execute(array($iduser));
	Database::disconnect();
	$success = "success";
	echo json_encode(array("success" => $success));

	
?>