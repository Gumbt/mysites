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
	$idcliente=$_POST["idcliente"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$totalrow = 1;
	$sql="SELECT * FROM cliente WHERE id_cliente='$idcliente'";
	foreach($pdo->query($sql) as $row)
	{
		$totalrow++;
	}
	if($totalrow>1){
		$sql = "UPDATE `cliente` SET `nome`=?,`cpf`=?,`data_nasc`=?,`email`=?,`endereco`=?,`cep`=?,`telefone`=?,`sexo`=? WHERE `id_cliente`=?";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome,$cpf,$datanasc,$email,$endereco,$cep,$telefone,$sexo,$idcliente));
		Database::disconnect();
		$success = "success";
		echo json_encode(array("success" => $success,"idcliente" => $idcliente));

		
	}else{
		$success = "erro";
		echo json_encode(array("success" => $success));
	}
	
?>