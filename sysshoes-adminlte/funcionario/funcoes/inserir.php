<?php
	require_once("../../banco/config.php");
	$nome=$_POST["nome"];
	$cpf=$_POST["cpf"];
	$endereco=$_POST["endereco"];
	$cep=$_POST["cep"];
	$telefone=$_POST["telefone"];
	$email=$_POST["email"];
	$datanasc=$_POST["datanasc"];
	$sexo=$_POST["sexo"];
	$cargo=$_POST["cargo"];
	$user=$_POST["user"];
	$senha=$_POST["senha"];
	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$totalrow = 1;
	$sql="SELECT * FROM user WHERE cpf='$cpf'";
	foreach($pdo->query($sql) as $row)
	{
		$totalrow++;
	}
	if($totalrow==1){
		$sql = "INSERT INTO `user`(`nome`, `cpf`, `endereco`,`cep`,`telefone`,`email`,`data_nasc`,`sexo`,`cargo`,`usuario`,`senha`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome,$cpf,$endereco,$cep,$telefone,$email,$datanasc,$sexo,$cargo,$user,$senha));
		$sql = "SELECT * FROM user WHERE cpf=?";
		$q = $pdo->prepare($sql);
		$q->execute(array($cpf));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$id_user = $data["id_user"];
		Database::disconnect();
		$success = "success";
		echo json_encode(array("success" => $success, "iduser" => $id_user));

		
	}else{
		$success = "erro";
		echo json_encode(array("success" => $success));
	}
	
?>