<?php
	require_once("../../banco/config.php");
	$nome=$_POST["nome"];
	$preco=$_POST["preco"];
	$marca=$_POST["marca"];
	$fornecedor=$_POST["fornecedor"];
	$descricao=$_POST["descricao"];
	$modelo=$_POST["modelo"];

	session_start();
	$pdo=Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$totalrow = 1;
	$sql="SELECT * FROM produto WHERE nome='$nome'";
	foreach($pdo->query($sql) as $row)
	{
		$totalrow++;
	}
	if($totalrow==1){
		$sql = "INSERT INTO `produto`(`nome`, `preco`, `marca`,`fornecedor`,`descricao`,`modelo`,`foto`) VALUES (?,?,?,?,?,?,?)";
		$q=$pdo->prepare($sql);
		$q->execute(array($nome,$preco,$marca,$fornecedor,$descricao,$modelo,0));
		$sql = "SELECT * FROM produto WHERE nome=? AND modelo=?";
		$q = $pdo->prepare($sql);
		$q->execute(array($nome,$modelo));
		$data = $q->fetch(PDO::FETCH_ASSOC);//atribui um array associativo a var data
		$id_produto = $data["id_produto"];
		
		$contelements = $_POST['contelements'];
		if($contelements>0){
			$corarray = $_POST['cor'];
			$unidadesarray = $_POST['unidades'];
			$tamanhoarray = $_POST['tamanho'];
			for($i=0;$i<$contelements;$i++) {
				$sql="INSERT INTO unidades (tamanho,unidades,cor,id_produto) values(?,?,?,?)";
				$q=$pdo->prepare($sql);
				$q->execute(array($tamanhoarray[$i],$unidadesarray[$i],$corarray[$i],$id_produto));		
			}
		}
		Database::disconnect();

		$success = "success";
		echo json_encode(array("success" => $success,"idproduto" => $id_produto));

		
	}else{
		$success = "erro";
		echo json_encode(array("success" => $success));
	}
	
?>