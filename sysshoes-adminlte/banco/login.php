<?php
	require_once("config.php");
	$senha=$_POST["senha"];
	$usuario=$_POST["username"];
	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$totalrow = 1;
	$sql="SELECT * FROM user WHERE usuario='$usuario' AND senha='$senha'";
	foreach($pdo->query($sql) as $row)
	{
		$totalrow++;
	}
	if($totalrow>1){
		$sql2="SELECT * FROM user WHERE usuario=? AND senha=?";
		$q = $pdo->prepare($sql2);
		$q->execute(array($usuario,$senha));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$name = $data["name"];
		$usuario = $data["usuario"];
		$_SESSION["usuario"]=base64_encode($usuario);
		$_SESSION["senha"]=base64_encode($senha);
		Database::disconnect(); 
		header("Location:../");

		
	}else{
		header("Location:../login?erro=true");
	}
	
?>