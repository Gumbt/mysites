<?php
	require_once("../../banco/config.php");
	$idproduto=$_POST["idproduto"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM `produto` WHERE id_produto=?";
	$q=$pdo->prepare($sql);
	$q->execute(array($idproduto));
	$sql = "DELETE FROM `unidades` WHERE id_produto=?";
	$q=$pdo->prepare($sql);
	$q->execute(array($idproduto));
	Database::disconnect();
	$success = "success";
	echo json_encode(array("success" => $success));

	
?>