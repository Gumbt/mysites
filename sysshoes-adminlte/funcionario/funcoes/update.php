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
	$iduser=$_POST["iduser"];
	$cargo=$_POST["cargo"];
	$user=$_POST["user"];
	$senha=$_POST["senha"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$totalrow = 1;
	$sql="SELECT * FROM user WHERE id_user='$iduser'";
	foreach($pdo->query($sql) as $row)
	{
		$totalrow++;
	}
	if($totalrow>1){
		$sql = "UPDATE `user` SET `nome`=?,`cpf`=?,`data_nasc`=?,`email`=?,`endereco`=?,`cep`=?,`telefone`=?,`sexo`=?,`cargo`=?,`usuario`=?,`senha`=? WHERE `id_user`=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome,$cpf,$datanasc,$email,$endereco,$cep,$telefone,$sexo,$cargo,$user,$senha,$iduser));
		Database::disconnect();
		$success = "success";
		echo json_encode(array("success" => $success,"iduser" => $iduser));

		
	}else{
		$success = "erro";
		echo json_encode(array("success" => $success));
	}
	
?>