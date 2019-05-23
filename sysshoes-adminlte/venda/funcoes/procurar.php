<?php
	require_once("../../banco/config.php");
	$cpfprocurar=$_POST["cpfprocurar"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$totalrow = 1;
	$sql="SELECT * FROM cliente WHERE cpf='$cpfprocurar'";
	foreach($pdo->query($sql) as $row)
	{
		$totalrow++;
	}
	if($totalrow>1){

		$sql = "SELECT * FROM cliente WHERE cpf=?";
		$q = $pdo->prepare($sql);
		$q->execute(array($cpfprocurar));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$nome = $data["nome"];
		$cpf = $data["cpf"];
		$id_cliente = $data["id_cliente"];
		$data_nasc = $data["data_nasc"];
		$email = $data["email"];
		$endereco = $data["endereco"];
		$cep = $data["cep"];
		$telefone = $data["telefone"];
		$sexo = $data["sexo"];
		Database::disconnect();
		$success = "success";
		if($sexo=="M"){
			$sexo2 = "Masculino";
		}if($sexo=="F"){
			$sexo2 = "Feminino";
		}if($sexo=="O"){
			$sexo2 = "Outro";
		}
		
		
		echo json_encode(array("success" => $success,"idcliente" => $id_cliente,"datanasc" => $data_nasc,"nome" => $nome,"cpf" => $cpf,"email" => $email,"endereco" => $endereco,"cep" => $cep,"telefone" => $telefone,"sexo" => $sexo2));

		
	}else{
		$success = "erro";
		Database::disconnect();	
		echo json_encode(array("success" => $success));
	}
	
?>