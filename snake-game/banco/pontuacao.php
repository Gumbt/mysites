<?php
	require_once("config.php");
	$dificuldade=$_POST["dificuldade"];
	$pontos=$_POST["pontos"];
	$nome=$_POST["nome"];
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO `snake`(`nome`, `pontos`, `dificuldade`) VALUES (?,?,?)";
	$q=$pdo->prepare($sql);
	$q->execute(array($nome,$pontos,$dificuldade));
	Database::disconnect();

?>